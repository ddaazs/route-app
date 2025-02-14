<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Post</title>

    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('post.nav')
    <div class="mx-20 mt-2 card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                    <div>
                        <h5 class="mb-0 card-title"><a href="#"> {{ $post->user->name }}
                            </a></h5>
                    </div>
                </div>
                <div>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a class="mx-2 " href="{{ route('post.edit', $post->id) }}">Edit</a>
                    <a href="{{ route('post.show', $post->id) }}"> View </a>
                        <button type="submit" class="btn-close" data-bs-dismiss="alert" ></button>
                    </form>
                </div>
            </div>
        </div>
        @if ($editing ?? false  )
        <div class="card-body">

            <form action="{{ route('post.update',$post->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                </div>
                <div>
                    <button class="btn btn-dark" type="submit"> Edit </button>
                </div>
            </form>
        @else
        <div class="card-body">
            <p class="fs-6 fw-light text-muted">
                {{ $post->content }}
            </p>

            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                        </span> {{ $post->likes }} </a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $post->created_at }} </span>
                    <span class='fs-6 fw-light text-muted'>I</span>
                </div>
            </div>
        @endif

            {{-- comment --}}
            <div>
                <div class="mb-3">
                    <textarea class="fs-6 form-control" rows="1"></textarea>
                </div>
                <div>
                    <button class="btn btn-primary btn-sm"> Post Comment </button>
                </div>
                <hr>
                <div class="d-flex align-items-start">
                    <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
                    <div class="w-100">
                        <div class="d-flex justify-content-between">
                            <h6 class="">Luigi
                            </h6>
                            <small class="fs-6 fw-light text-muted"> 3 hour
                                ago</small>
                        </div>
                        <p class="mt-3 fs-6 fw-light">
                            comment
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
