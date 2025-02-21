<h4> Share yours post </h4>
<div class="row">
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <div>
            <button class="btn btn-dark" type="submit"> Share </button>
        </div>
    </form>
</div>
<hr>
