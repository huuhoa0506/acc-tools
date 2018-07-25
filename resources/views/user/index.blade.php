@extends('layouts.master')


@section('content')
	<div class="m_datatable" id="ajax_data"></div>
@endsection


@section('js')
	<script type="text/javascript" src="{{ asset('assets/demo/default/custom/components/datatables/base/data-ajax.js') }}"></script>
@endsection