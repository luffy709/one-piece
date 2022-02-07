@extends('layouts.app')

@section('content')
    <div class="contact">
        <div class="contact__title">
            <h2>Formulaire de contact</h2>
        </div>

        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div style="background: red; width: 80%; height: 4rem; margin: 1rem auto;" class="d-flex align-items-center ps-2">
                        <p style="color: white; font-size: 1.5rem;" class="m-0">
                            {{ $error }}
                        </p>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="contact">
            <div class="contact__form">
                <form method="post" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="form-group contact__form__group">
                        <label for="lastname" class="contact__form__group-label">Nom</label>
                        <input type="text" name="lastname" id="lastname" class="contact__form__group-input">
                    </div>

                    <div class="form-group contact__form__group">
                        <label for="firstname" class="contact__form__group-label">Prénom</label>
                        <input type="text" name="firstname" id="firstname" class="contact__form__group-input">
                    </div>

                    <div class="form-group contact__form__group">
                        <label for="toEmail" class="contact__form__group-label">to email</label>
                        <input type="email" name="toEmail" id="toEmail" class="contact__form__group-input">
                    </div>

                    <div class="form-group contact__form__group">
                        <label for="email" class="contact__form__group-label">Email</label>
                        <input type="email" name="email" id="email" class="contact__form__group-input">
                    </div>

                    <div class="form-group contact__form__group">
                        <label for="message" class="contact__form__group-label">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="contact__form__group-textarea"></textarea>
                    </div>

                    <button type="submit" class="btn btn-secondary contact__form__button">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush
