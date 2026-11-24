<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Requests\MyClass\ClassCreate;
use App\Http\Requests\MyClass\ClassUpdate;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class MyClassController extends Controller
{
    protected $my_class, $user;

    public function __construct(MyClassRepo $my_class, UserRepo $user)
    {
        $this->middleware('teamSA', ['except' => ['destroy',] ]);
        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_class = $my_class;
        $this->user = $user;
    }

    public function index()
    {
        $d['my_classes'] = $this->my_class->all();
        $d['class_types'] = $this->my_class->getTypes();

        return view('pages.support_team.classes.index', $d);
    }

    public function store(ClassCreate $req)
    {
        $data = $req->except(['_token']);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($req->name);
        }
        $data['is_published'] = $req->has('is_published') ? (bool) $req->is_published : true;

        $mc = $this->my_class->create($data);

        // Create Default Section / Batch
        $s = [
            'my_class_id' => $mc->id,
            'name' => 'Cohort 1',
            'active' => 1,
            'teacher_id' => NULL,
        ];

        $this->my_class->createSection($s);

        return Qs::jsonStoreOk();
    }

    public function edit($id)
    {
        $d['c'] = $c = $this->my_class->find($id);
        $d['class_types'] = $this->my_class->getTypes();

        return is_null($c) ? Qs::goWithDanger('classes.index') : view('pages.support_team.classes.edit', $d) ;
    }

    public function update(ClassUpdate $req, $id)
    {
        $data = $req->except(['_token', '_method']);
        if (!empty($req->name) && empty($data['slug'])) {
            $data['slug'] = Str::slug($req->name);
        }
        $data['is_published'] = $req->has('is_published') ? (bool) $req->is_published : false;

        $this->my_class->update($id, $data);

        return Qs::jsonUpdateOk();
    }

    public function destroy($id)
    {
        $class = $this->my_class->find($id);
        if ($class) {
            $class->sections()->delete();
            $class->delete();
        }
        return back()->with('flash_success', __('msg.del_ok'));
    }

}
