@extends('layouts.app')

@section('titre')
    Update Question | Mini stack
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mettre à jour une question') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('questions.update', $question->id) }}">
                        @csrf
                         @method('PUT')
                            <div class="row mb-3">
                                <label for="titre" class="col-md-4 col-form-label text-md-end">{{ __('Titre') }} <span class="text-danger fw-bold">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre', $question->titre) }}" required autocomplete="titre" autofocus>

                                    @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('Body') }} <span class="text-danger fw-bold">*</span></label>

                                <div class="col-md-6">
                                    <textarea rows="5" cols="30"
                                              class="form-control @error('body') is-invalid @enderror" name="body"
                                              required autocomplete="body">{{ old('body',$question->body) }}</textarea>

                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

