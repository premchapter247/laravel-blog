<x-app-layout>
<x-header/> 

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <a href="{{url('add-blog')}}" class="btn btn-primary add-blog" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Add New Blog</a> 
            </div>   
        </div>    
    </div>    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-2" style="margin: auto; background: #fff">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                 @if ($message = Session::get('error'))
                 <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SNo</th>
                        <th scope="col">image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Category</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                        @foreach ($postData as $item)
                            <tr class="table-active">
                                <th scope="row">{{$i}}</th>
                                <td><img src="{{$item->main_image}}" class='image-thumb border border-primary'></td>
                                <td>{{$item->title}}</td>
                                <td>{{get_tag_by_id($item->tag)}}</td>
                                <td>{{App\Models\Category::find($item->category_id)->category}}</td>
                                <td>@if($item->status==1) <a href="{{url('change-status')}}/{{$item->id}}/{{2}}" onclick="return confirm('Do you want to change status to Inactive?')"><span class="badge badge-primary" >Active</span></a> @else <a href="{{url('change-status')}}/{{$item->id}}/{{1}}" onclick="return confirm('Do you want to change status to Active?')"><span class="badge badge-danger">Inactive</span></a> @endif</td>
                                <td>
                                    <a href="{{url('edit-blog')}}/{{$item->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="{{url('delete-blog')}}/lll{{$item->id}}" onclick="return confirm('Do you want to delete it?')"><i class="fa fa-trash danger" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
      <style>
          .image-thumb{
            max-width:100px;
          }
          .add-blog{
            float: right;
          }
      </style>
<x-footer/> 
</x-app-layout>