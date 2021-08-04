<div  class="col-md-12" >
   <button  class="btn btn-primary modal_edit" data-url="{{ url('admin/user-profile/0/edit') }}" data-size="md" style="padding-right: 20px;float: right;"><i class="fa fa-edit"></i> Ubah </button>


</div>

<div class="col-md-4 font-weight-bold">
    Nama
</div>
<div class="col-md-8 ">
    : {{ Auth::user()->name }}
</div>
<div class="col-md-4 font-weight-bold">
    Username
</div>
<div class="col-md-8">
    : {{ Auth::user()->username }}
</div>


    
