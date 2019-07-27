@extends('templates.header')

@section('content')
    @include('templates.error')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Skeleton <a  href="{{ route('skeleton.create') }}" class="btn btn-outline-primary"><i class="mdi mdi-plus"></i> Tambah Data</a></h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Field 1</th>
                        <th>Field 2</th>
                        <th>Field 3</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach (@$result ? $result : [] as $row)
                        <tr>
                            <td>{{ isset($i) ? ++$i : $i = 1  }}</td>
                            <td>{{ $row->field1 }}</td>
                            <td>{{ $row->field2 ? $row->field2->format('d M y') : '-' }}</td>
                            <td>{{ $row->field3 }}</td>
                            <td><img src="{{ $row->gambar_file }}" alt="" /></td>
                            <td class="no-wrap">
                                <a href="{{ route('skeleton.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>
                                <form action="{{ route('skeleton.destroy', @$row->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
@endpush

@push('script')
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(function () {
        $('.table').DataTable();
      })
    </script>
@endpush