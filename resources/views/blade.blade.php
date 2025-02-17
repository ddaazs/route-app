    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.css">
        <title>hehe</title>
    </head>

    <body>
        @sectionMissing('navigation')
            <div class="pull-right">
                <x-layouts.nav />
            </div>
        @endif
        <x-alert />
        {{-- {{ var_dump($user) }} --}}
            <form action="" method="get">
            <input type="checkbox" name="active" value="active"     @checked(old('active', $user->active))>
            <input type="email" name="emai  l" value="email@laravel.com" @readonly($user->is_admin) />
            <select name="option" id="option">
                <x-input.option :selected="'hehe'" value="hehe" label="Hehe Option" />
                <x-input.option :selected="'haha'" value="haha" label="HaHa Option" />
            </select>
            <button class="btn" type="submit">Test</button>
        </form>
        {{-- <x-alert>
            <x-slot:title>
                Server Error
            </x-slot>

            <strong>Whoops!</strong> Something went wrong!
        </x-alert> --}}

        {{-- header variable
        <x-header type="error" :message="'Test message'"/>
        <span class="alert-title">{{ $title }}</span> --}}
        <x-header class="w-20">
            <x-slot:title>
                Server Error
            </x-slot>
            <strong>Whoops!</strong> Something went wrong!
        </x-header>

        <x-section class="mb-24" >
            This is section
          </x-section>
    </body>

    </html>
