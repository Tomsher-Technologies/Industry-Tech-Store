<form action="{{ $route }}" onclick="return confirm('Are you sure you want to delete?')" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button  type="submit" type="submit" class="btn btn-soft-danger btn-icon btn-circle btn-sm" >
        <i class="las la-trash"></i>
    </button>
</form>
