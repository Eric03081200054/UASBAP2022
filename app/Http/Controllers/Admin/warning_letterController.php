<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\warning_letter;
use Illuminate\Http\Request;

class warning_letterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $warning_letter = warning_letter::where('employee_id', 'LIKE', "%$keyword%")
                ->orWhere('nama_karyawan', 'LIKE', "%$keyword%")
                ->orWhere('alasan_sp', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $warning_letter = warning_letter::latest()->paginate($perPage);
        }

        return view('admin.warning_letter.index', compact('warning_letter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.warning_letter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        warning_letter::create($requestData);

        return redirect('admin/warning_letter')->with('flash_message', 'warning_letter added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $warning_letter = warning_letter::findOrFail($id);

        return view('admin.warning_letter.show', compact('warning_letter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $warning_letter = warning_letter::findOrFail($id);

        return view('admin.warning_letter.edit', compact('warning_letter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $warning_letter = warning_letter::findOrFail($id);
        $warning_letter->update($requestData);

        return redirect('admin/warning_letter')->with('flash_message', 'warning_letter updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        warning_letter::destroy($id);

        return redirect('admin/warning_letter')->with('flash_message', 'warning_letter deleted!');
    }
}
