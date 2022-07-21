@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('content')



    {{-- Registered Artists --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center" style="color: #000000;">Add Whitelist</h4>
                <div class="col-sm-8 offset-2">
                    <form method="POST" action="{{ route('add.whitelist.submit') }}" enctype="multipart/form-data">
                        @csrf



                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="2547XXXXXXXX">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-dark">All Whitelists</h4>
                    <div class="col-lg-10 offset-1 table-responsive">
                        <table class="table table-striped table-hover" id="ArtistTable">
                            <thead>
                            <tr>
                                <th class="text-center"> ID </th>
                                <th class="text-center"> Phone</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($whitelists as $whitelist)
                                <tr>
                                    <td class="text-center">{{ $whitelist->id }}</td>
                                    <td class="text-center">{{ $whitelist->phone }}</td>


                                    <td class="text-center">
                                        <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('delete.whitelist', $whitelist->id) }}">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">No Registered Artists</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of registered Users --}}

@endsection

