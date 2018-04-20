<!-- Task Listing Page -->
@extends('layouts.adminapp')
@section('content')

<main id="main-container">
<!-- Page Content -->
<div class="content">
    <!-- Relationship Manager Management -->
    <h2 class="content-heading">{{ $title }} Management</h2>

    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $title }} Listing</h3>
            <div class="block-options">
                <div>
                    <a href="{{ url('/admin/relationshipmanager/create') }}" class="btn btn-info min-width-125" style="color:#fff;">Add New Relationship Manager</a>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <div class="alert alert-{{ $msg }} alert-dismissable mb-20" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <p class="mb-0"><a class="alert-link" href="javascript:void(0)">{{ ucfirst(($msg == 'danger') ? "Error" : $msg) }}!</a> {{ Session::get('alert-' . $msg) }}</p>
                    </div>
                @endif
            @endforeach
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell">Email</th>
                        <th class="d-none d-sm-table-cell">Phone</th>
                        <th class="d-none d-sm-table-cell">RM Code</th>
                        <th class="d-none d-sm-table-cell">Username</th>
                        <th class="d-none d-sm-table-cell">Added Date</th>
                        <th class="d-none d-sm-table-cell">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td class="text-center">1</td>
                        <td class="font-w600">Jeffrey Shaw</td>
                        <td class="d-none d-sm-table-cell">customer1@example.com</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-success">VIP</span>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                <i class="fa fa-user"></i>
                            </button>
                        </td>
                    </tr> -->
                    @if(!empty($managerdata) && count($managerdata) > 0)
                      @foreach($managerdata as $manager)
                        <tr>
                          <td>{{ $manager->id }}</td>
                          <td>{{ $manager->name }}</td>
                          <td>{{ $manager->email }}</td>
                          <td>{{ $manager->phone }}</td>
                          <td>{{ $manager->rm_code }}</td>
                          <td>{{ $manager->username }}</td>
                          <td>{{ date('d M Y', strtotime($manager->created_at)) }}</td>
                          <td>
                            @if($manager->status == 'Inactive')
                              <span class="badge badge-danger pmd-ripple-effect">Inactive</span>  
                            @else
                              <span class="badge badge-info pmd-ripple-effect">Active</span>
                            @endif
                          </td>
                          <td class="text-center">
                            <!-- <a href="javascript:void(0);" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="generaldelete_confirm({{ $manager->id }}, 'relationshipmanager', 'task', 'id')">
                              <i class="material-icons md-dark pmd-sm">delete</i>
                            </a> -->
                            <a href="{{ url('/admin/relationshipmanager/'.$manager->id.'/edit') }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit Details">
                                <i class="fa fa-pencil"></i>
                            </a>  
                          </td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="9" align="center" style="text-align:center;">No Relationship Manager(s) Found.</td>  
                      </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->
</main>

<div tabindex="-1" class="modal fade" id="delete-dialog" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"> Are you sure you want to inactive this relationship manager? </div>
      <div class="pmd-modal-action text-right">
        <a class="btn pmd-ripple-effect btn-primary pmd-btn-flat" href="javascript:void(0)" id="deleteconfirm">Confirm</a>
        <button data-dismiss="modal" class="btn pmd-ripple-effect btn-default pmd-btn-flat" type="button">Discard</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('pagewisescripts')
<!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page JS Code -->
  <script src="{{ asset('js/pages/be_tables_datatables.js') }}"></script>
@endsection
