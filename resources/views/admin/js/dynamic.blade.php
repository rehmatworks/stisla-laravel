function BaseUrl(path = '') {
    return '{!! url('/') !!}/' + path;
}

const AuthUser = {!! Auth::check() ? Auth::user()->toJson() : 'false' !!};
