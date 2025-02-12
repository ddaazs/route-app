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
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                <div class="overflow-hidden card">
                    <div class="pt-3 card-body">
                        <ul class="gap-2 nav nav-link-secondary flex-column fw-bold">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="#">
                                    <span>Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Explore</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Feed</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Terms</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Support</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span>Settings</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="py-2 text-center card-footer">
                        <a class="btn btn-link btn-sm" href="#">View Profile </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                @include('post.alert')
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
                <div class="mt-3">
                    @include('post.content')
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="pb-0 border-0 card-header">
                        <h5 class="">Search</h5>
                    </div>
                    <div class="card-body">
                        <input placeholder="...
                        " class="form-control w-100" type="text"
                            id="search">
                        <button class="mt-2 btn btn-dark"> Search</button>
                    </div>
                </div>
                <div class="mt-3 card">
                    <div class="pb-0 border-0 card-header">
                        <h5 class="">Who to follow</h5>
                    </div>
                    <div class="card-body">
                        <div class="gap-2 mb-3 hstack">
                            <div class="avatar">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                            </div>
                            <div class="overflow-hidden">
                                <a class="mb-0 h6" href="#!">Mario Brother</a>
                                <p class="mb-0 small text-truncate">@Mario</p>
                            </div>
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                                    class="fa-solid fa-plus"> </i></a>
                        </div>
                        <div class="gap-2 mb-3 hstack">
                            <div class="avatar">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                            </div>
                            <div class="overflow-hidden">
                                <a class="mb-0 h6" href="#!">Mario Brother</a>
                                <p class="mb-0 small text-truncate">@Mario</p>
                            </div>
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                                    class="fa-solid fa-plus"> </i></a>
                        </div>
                        <div class="mt-3 d-grid">
                            <a class="btn btn-sm btn-primary-soft" href="#!">Show More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
