<form id="contactForm">
    <div class="row row-cols-1 row-cols-md-2 g-3 mb-3">
        <div class="col">
            <label class="form-label">{{ lang('Name', 'contact us') }} : <span class="red">*</span></label>
            <input type="text" name="name" class="form-control form-control-md"
                value="{{ userAuthInfo()->name ?? old('name') }}" required />
        </div>
        <div class="col">
            <label class="form-label">{{ lang('Email address', 'contact us') }} : <span
                    class="red">*</span></label>
            <input type="email" name="email" class="form-control form-control-md"
                value="{{ userAuthInfo()->email ?? old('email') }}" required />
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">{{ lang('Subject', 'contact us') }} : <span class="red">*</span></label>
        <input type="text" name="subject" class="form-control form-control-md" value="{{ old('subject') }}"
            required />
    </div>
    <div class="mb-3">
        <label class="form-label">{{ lang('Message', 'contact us') }} : <span class="red">*</span></label>
        <textarea type="text" name="message" name="message" class="form-control" rows="8" required>{{ old('message') }}</textarea>
    </div>
    {!! display_captcha() !!}
    <div class="d-flex justify-content-start">
        <button id="sendMessage" class="btn btn-primary btn-md"><i
                class="far fa-paper-plane me-2"></i>{{ lang('Send', 'contact us') }}</button>
    </div>
</form>
@push('scripts')
    {!! google_captcha() !!}
@endpush
