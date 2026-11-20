<?php

namespace App\Repositories;

use App\Helpers\Qs;
use App\Models\Payment;
use App\Models\PaymentRecord;
use App\Models\Receipt;

class PaymentRepo
{

    public function all()
    {
        return Payment::all();
    }

    public function getPayment($data)
    {
        return Payment::where($data)->with('my_class');
    }

    public function getGeneralPayment($data)
    {
        return Payment::whereNull('my_class_id')->where($data)->with('my_class');
    }

    public function getActivePayments()
    {
        return $this->getPayment(['year' => Qs::getCurrentSession()]);
    }

    public function getPaymentYears()
    {
        return Payment::select('year')->distinct()->get();
    }

    public function find($id)
    {
        return Payment::find($id);
    }

    public function create($data)
    {
        return Payment::create($data);
    }

    public function update($id, $data)
    {
        return Payment::find($id)->update($data);
    }

    public function delete($id)
    {
        return Payment::destroy($id);
    }

    /************** PAYMENT RECORDS ***************/

    public function findMyPR($st_id, $pay_id)
    {
        return $this->getRecord(['student_id' => $st_id, 'payment_id' => $pay_id]);
    }

    public function getAllMyPR($st_id, $year = NULL)
    {
        return $year ? $this->getRecord(['student_id' => $st_id, 'year' => $year]) : $this->getRecord(['student_id' => $st_id]);
    }

    public function getRecord($data, $order = 'year', $dir = 'desc')
    {
        return PaymentRecord::orderBy($order, $dir)->where($data)->with('payment');
    }

    public function createRecord($data)
    {
        return PaymentRecord::firstOrCreate($data);
    }

    public function findRecord($id)
    {
        return PaymentRecord::findOrFail($id);
    }

    public function updateRecord($id, $data)
    {
        return PaymentRecord::find($id)->update($data);
    }

    /************** PAYMENT RECEIPTS ***************/

    public function createReceipt($data)
    {
        return Receipt::Create($data);
    }

    public function deleteReceipts($data)
    {
        return Receipt::where($data)->delete();
    }

    public function getReceipt($data)
    {
        return Receipt::where($data);
    }

    public function getAllMyReceipts($pr_id)
    {
        return $this->getRecord(['pr_id' => $pr_id])->get();
    }

    /************** AL-TAQWA ENROLLMENTS & RAZORPAY ***************/

    public function createEnrollment($data)
    {
        return \App\Models\Enrollment::create($data);
    }

    public function findEnrollment($id)
    {
        return \App\Models\Enrollment::with(['student', 'course', 'batch'])->find($id);
    }

    public function getStudentEnrollments($student_id)
    {
        return \App\Models\Enrollment::where('student_id', $student_id)
            ->with(['course', 'batch'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getActiveEnrollment($student_id, $course_id)
    {
        return \App\Models\Enrollment::where('student_id', $student_id)
            ->where('my_class_id', $course_id)
            ->where('status', 'active')
            ->first();
    }

    public function processRazorpayEnrollment($student_id, $course_id, $batch_id, $payment_id, $amount, $fee_type)
    {
        $validUntil = null;
        if ($fee_type === 'monthly_subscription') {
            $validUntil = now()->addDays(30)->toDateString();
        }

        $enrollment = \App\Models\Enrollment::create([
            'student_id' => $student_id,
            'my_class_id' => $course_id,
            'section_id' => $batch_id,
            'order_id' => $payment_id,
            'amount_paid' => $amount,
            'fee_type' => $fee_type,
            'status' => 'active',
            'valid_until' => $validUntil,
            'eligible_for_refund' => false,
            'refund_status' => 'none',
        ]);

        return $enrollment;
    }

    public function getRefundEligibleEnrollments()
    {
        return \App\Models\Enrollment::where('eligible_for_refund', true)
            ->where('refund_status', 'none')
            ->with(['student', 'course', 'batch'])
            ->get();
    }

    public function markRefundProcessed($enrollment_id)
    {
        $enr = \App\Models\Enrollment::find($enrollment_id);
        if ($enr) {
            $enr->update(['refund_status' => 'processed']);
            return true;
        }
        return false;
    }
}
