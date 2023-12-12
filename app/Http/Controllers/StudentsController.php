<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource and pagination.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        if (!empty($search)){
            $datastudents = Students::where('students.idstudents','like','%'.$search.'%')
                ->orWhere('students.nama','like','%'.$search.'%')
                ->paginate(5)->onEachSide(2)->fragment('std');
        }
        else{
            $datastudents = Students::paginate(5)->onEachSide(2)->fragment('std');
        }


        return view('students.data')->with([
            'students'=>$datastudents,
            'search'=>$search
            // 'students'=>Students::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        $validate = $request->validated();
        $students = new Students;
        $students->idstudents = $request->txtid;
        $students->nama = $request->txtnama;
        $students->kelamin = $request->txtgender;
        $students->alamat = $request->txtalamat;
        $students->email = $request->txtemail;
        $students->phone = $request->txtphone;
        $students->save();

        return redirect('students')->with('msg','Input Data Students Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students,$idstudents)
    {

        $data = $students->find($idstudents);
        return view('students.edit')->with([
            'txtid'=>$idstudents,
            'txtnama'=>$data->nama,
            'txtgender'=>$data->kelamin,
            'txtalamat'=>$data->alamat,
            'txtemail'=>$data->email,
            'txtphone'=>$data->phone
        ]);
        echo $data->nama;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students,$idstudents)
    {
        $data = $students->find($idstudents);
        $data->nama = $request->txtnama;
        $data->kelamin = $request->txtgender;
        $data->alamat = $request->txtalamat;
        $data->email = $request->txtemail;
        $data->phone = $request->txtphone;
        $data->save();

        return redirect('students')->with('msg','Update Data Students'.$data->nama.' Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students,$idstudents)
    {
        $data = $students->find($idstudents);
        $data->delete();

        return redirect('students')->with('msg','Data Students'.$data->nama.' Berhasil Dihapus');
    }
}
