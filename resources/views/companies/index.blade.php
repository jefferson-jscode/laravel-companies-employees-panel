@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Companies')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Companies')

{{-- Content body: main page content --}}

@section('content_body')
    
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add new company</h3>
        </div>

        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                <div class="row">
                    <x-adminlte-input name="name" label="Name" placeholder="Company name"
                        fgroup-class="col-md-6" />

                    <x-adminlte-input name="email" label="E-mail" type="email" placeholder="contact@company.com" fgroup-class="col-md-6" />
                </div>

                <div class="row">

                    <x-adminlte-input name="website" label="Website" placeholder="www.company.com" fgroup-class="col-md-6">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-globe"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <x-adminlte-input-file name="logo" label="Company Logo" placeholder="Choose a file..." fgroup-class="col-md-6"/>

                </div>

                <hr>

                <div class="row d-flex justify-content-between">
                    <x-adminlte-button label="Back" theme="outline-secondary" icon="fas fa-reply"/>
                    <x-adminlte-button class="btn-flat" type="submit" label="Save" theme="success" icon="fas fa-save" />
                </div>

            </div>
        </form>
    </div>

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush