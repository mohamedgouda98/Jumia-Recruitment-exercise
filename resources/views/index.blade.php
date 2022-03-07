<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <h2 align="center">Jumia - Recruitment exercise</h2>
        <form method="get" action="{{route('home')}}">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Country</label>
                <select class="form-select" name="countryCode" id="inputGroupSelect01">
                    <option value="">Choose...</option>
                    @foreach(getCountriesData() as $country)
                        <option  @if (request('countryCode') == $country['code']) selected @endif value="{{$country['code']}}">{{$country['name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" name="state" id="inputGroupSelect02">
                    <option value="">Choose...</option>
                    <option @if (request('state') == 'ok') selected @endif value="ok">OK</option>
                    <option @if (request('state') == 'nok') selected @endif value="nok">NOK</option>
                </select>
                <label class="input-group-text" for="inputGroupSelect02">State</label>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Country</td>
                <td>State</td>
                <td>Country code</td>
                <td>Phone number</td>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->CountryName}}</td>
                    <td>{{$customer->State}}</td>
                    <td>{{$customer->CountryCode}}</td>
                    <td>{{$customer->phone}}</td>
                </tr>
            @endforeach

            </tbody>

        </table>

        {{ $customers->links('pagination::bootstrap-4') }}


    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
