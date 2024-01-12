 @foreach($plans as $plan)
    <tr class="table-success">
    <td>{{$loop->iteration}}</td>
    <td>{{$plan->plan_name}}</td>
    @foreach($plan->planCategoryMap as $key => $val)
    <td>{{$val->category_limit_name}}</td>
    @endforeach()
    <th><a href="{{url('admin/edit-plan')}}/{{$plan->plan_id}}"><i class="fas fa-edit"></i></a> </th>
    </tr>
@endforeach