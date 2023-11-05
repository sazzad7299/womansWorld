@extends('backend.layouts.app')
@push('css')
<style>
    .ml-16{
        margin-left: 16px!important;
    }
</style>
@endpush
@section('title', 'Category')
@section('content')
<div class="card">
    <div class="card-header py-3">
      <h6 class="mb-0">Add Product Category</h6>
    </div>
    <div class="card-body">
       <div class="row">
         <div class="col-12 col-lg-4 d-flex">
           <div class="card border shadow-none w-100">
             <div class="card-body">
               <form class="row g-3">
                 <div class="col-12">
                   <label class="form-label">Name</label>
                   <input type="text" class="form-control" placeholder="Category name">
                 </div>
                 <div class="col-12">
                  <label class="form-label">Slug</label>
                  <input type="text" class="form-control" placeholder="Slug name">
                </div>
                <div class="col-12">
                  <label class="form-label">Parent</label>
                  <select class="form-select">
                    <option>W.W Professional</option>
                    <option>W.W Cosmetics</option>
                    <option>Kona Cosmetics</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Description</label>
                  <textarea class="form-control" rows="3" cols="3" placeholder="Product Description"></textarea>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-primary">Add Category</button>
                  </div>
                </div>
               </form>
             </div>
           </div>
         </div>
         <div class="col-12 col-lg-8 d-flex">
          <div class="card border shadow-none w-100">
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table align-middle">
                   <thead class="table-light">
                     <tr>
                       <th>ID</th>
                       <th>Name</th>
                       <th>Slug</th>
                       <th>Parent</th>
                       <th>Status</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                    <x-categories :categories="$categories" :model="'App\Models\Category'" />
                   </tbody>
                 </table>
              </div>
            </div>
          </div>
        </div>
       </div><!--end row-->
    </div>
  </div>
@endsection
@push('js')
@endpush
