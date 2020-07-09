@extends('layouts.master')
<style type="text/css">
.pointer {cursor: pointer;}
</style>
<link href="https://cdn.jsdelivr.net/gh/xxjapp/xdialog@3/xdialog.min.css" rel="stylesheet"/>
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@section('content')
  <div class="content-i">
    <div class="content-box">
      <div class="element-wrapper">
        <h6 class="element-header">
          KCP Numbers
        </h6>
        <div class="element-box">
          <h5 class="form-header">
            KCP Numbers - List 
            <div style="float: right; position: inherit;">
              <a href="{{ route('KCPNumber.create') }}" class="btn btn-lg btn-success">
                <i class="fa fa-plus-circle"> New</i>
               </a>
            </div>
          </h5>
         
          
        @if ($message = Session::get('success'))
        <p></p>
          <div class="alert alert-success" id="msg">
              <p>{{ $message }}</p>
          </div>
        @elseif ($message = Session::get('danger'))
          <div class="alert alert-danger" id="msg">
              <p>{{ $message }}</p>
          </div>
        @endif
          <div class="form-desc">
            <!-- <a href="https://www.datatables.net/" target="_blank">Learn More about DataTables</a> -->
          </div>
          <div class="table-responsive">
            <table id="dataTable1" width="100%" class="table table-sm table-striped table-bordered table-lightfont">
            	<thead>
            		<tr>
            			<th class="text-primary" style="width: 4.33%">S.no</th>
            			<th class="text-primary">Start Range</th>
            			<th class="text-primary">End Range</th>
                  <th class="text-primary">Last Issued No</th>
                  <th class="text-primary">Issued Date</th>
                  <th class="text-primary">Created</th>
                  <th class="text-primary">Status</th>
                  <th class="text-primary">Actions</th>
            		</tr>
            	</thead>
            	<tbody>
            		<?php
      					 $i = 1;
      					?>
					    @foreach ($kcp_number as $key => $kcp)
                	<tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $kcp->start_range }}</td>
                    <td>{{ $kcp->end_range }}</td>
                    <td>{{ $kcp->last_issued_no }}</td>
                    <td>{{ $issue_date=date('d-m-Y', strtotime($kcp->created_at)) }}</td>
                    <td>{{ $created=date('d-m-Y h:i:s', strtotime($kcp->created_at)) }}</td>
                    <td><span class="badge badge-secondary">{{ $kcp->status }}</span></td>

                    <td class="row-actions">
                      <a href="{{ route('KCPNumber.edit',$kcp->id) }}" data-toggle="tooltip" data-placement="top"
                          title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
                      <a class="danger pointer" onclick="deleteData({{$kcp->id}})" type="submit" data-id="{{$kcp->id}}" data-toggle="tooltip" data-placement="top"
                          title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                    </td>

                	</tr>
            		@endforeach 
            	</tbody>
            	
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    function deleteData(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "{{ url('/KCPNumberStatusUpdate')}}" + '/' + id,
                    type : "GET",
                    data : {'_method' : 'PUT'},
                    success: function(data){
                        swal("Done! Record successfully deleted!", {
                        icon: "success",
                        }).then(function() {
                            window.location = "KCPNumber";
                        });
                    },
                    error : function(){
                        swal({
                            title: 'Opps...',
                            text : data.message,
                            type : 'error',
                            timer : '1500'
                        })
                    }
                })
            } else {
            swal("Your record is safe!");
            }
        });
      }
  </script>

@endsection