<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Col;
use App\Models\Row;
use App\Models\Item;

class RowController extends Controller
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
    public function create(Table $table, Row $row)
    {
        $cols = $table->cols;
        return view('rows.create_and_edit', compact('table', 'row', 'cols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Table $table, Request $request)
    {
        $row = Row::create();
        $row->table()->associate($table);
        $row->save();
        $cols = $table->cols;
        foreach ($cols as $col) {
            $data = [];
            $data['table_id'] = $table->id;
            $data['col_id'] = $col->id;
            $data['row_id'] = $row->id;
            switch ($col->data_sort) {
                case 1:
                    $data['int_val'] = (int) $request['col_'.$col->id];
                    break;
                case 2:
                    $data['float_val'] = (float) $request['col_'.$col->id];
                    break;
                case 3:
                    $data['text_val'] = (string) $request['col_'.$col->id];
                    break;
                case 4:
                    $data['date_val'] = date("Y-m-d",strtotime($request['col_'.$col->id]));
                    break;
                default:
                    break;
            }
            $item = Item::create($data);
        }
        return redirect()->route('tables.show', $table->id)->with('success', '插入行成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table, Row $row)
    {
        $cols = $table->cols;
        $items = $row->items;
        $i = 1;
        return view('rows.create_and_edit', compact('table', 'row', 'cols' ,'items' ,'i'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Table $table, Row $row, Request $request)
    {
        $cols = $table->cols;
        $items = $row->items;
        foreach ($items as $item) {
            $data = [];
            switch ($item->col->data_sort) {
                case 1:
                    $data['int_val'] = (int) $request['col_'.$item->col->id];
                    break;
                case 2:
                    $data['float_val'] = (float) $request['col_'.$item->col->id];
                    break;
                case 3:
                    $data['text_val'] = (string) $request['col_'.$item->col->id];
                    break;
                case 4:
                    $data['date_val'] = date("Y-m-d",strtotime($request['col_'.$item->col->id]));
                    break;
                default:
                    break;
            }
            $item->update($data);
        }
         return redirect()->route('tables.show', $table->id)->with('success', '更新行成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
