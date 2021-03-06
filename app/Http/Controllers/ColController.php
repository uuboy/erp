<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Col;
use App\Models\Item;
use Illuminate\Http\Request;

class ColController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Table $table, Col $col)
    {
        return view('cols.create_and_edit', compact('table', 'col'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Table $table, Col $col, Request $request)
    {
        $col->fill($request->all());
        $col->table()->associate($table);
        $col->save();
        if($table->rows->isNotEmpty())
        {
            foreach ($table->rows as $row) {
                $data = [];
                $data['table_id'] = $table->id;
                $data['col_id'] = $col->id;
                $data['row_id'] = $row->id;
                Item::create($data);
            }
        }

        return redirect()->route('tables.show', $table->id)->with('success', '插入列成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Col  $col
     * @return \Illuminate\Http\Response
     */
    public function show(Col $col)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Col  $col
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table, Col $col)
    {
         return view('cols.create_and_edit',compact('table', 'col'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Col  $col
     * @return \Illuminate\Http\Response
     */
    public function update(Table $table, Col $col, Request $request)
    {
        $col->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Col  $col
     * @return \Illuminate\Http\Response
     */
    public function destroy(Col $col)
    {
        //
    }
}
