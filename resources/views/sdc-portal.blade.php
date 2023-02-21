<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center">
    <div class="card-deck text-center">
      @foreach($data as $datum)
      <div class="card m-5 box-shadow" style="border: 1px solid black;">
        <img src="{{ $datum['url'] }}" class="card-img-top" style="width:70%" alt="Image 1">
        <div class="card-body">
          <button type="button" class="btn btn-primary btn-lg btn-block">{{ $datum['name'] }}</button>
        </div>
      </div>
      @endforeach
    </div>
</div>
</x-guest-layout>
