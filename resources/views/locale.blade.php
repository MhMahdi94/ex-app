<!DOCTYPE html>
<html>

<head>
    <title>Locale Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="mb-5"></div>
        <div class="card">
            <div class="card-header">
                {{ __('Hello') }}
            </div>
            <div class="card-body">
                {{-- <h5 class="card-title">{{ __('Hey! :Name, Welcome to magecomp', ["name" => "Johe Doe"]) }}</h5>
                <p class="card-text">{{ __('To Be an Organization that Inspires and Fulfills Ecommerce Dreams.') }}</p>
                <p class="card-text">{{ __('To Provide Top Notch E-commerce Products & Services that Build Long-Term Trustworthy Relationships.') }}</p> --}}
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('locale', ['locale' => 'en']) }}" type="button" class="btn btn-primary {{ Session::get('locale') == 'en' ? 'active' : ''}}">English</a>
                    <a href="{{ route('locale', ['locale' => 'ar']) }}" type="button" class="btn btn-primary {{ Session::get('locale') == 'ar' ? 'active' : ''}}">Arabic</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
	