@extends('layouts.frontend')

@section('title', 'Admission Enquiry | The Manthan School')

@section('meta_description', 'Begin your child’s learning journey with The Manthan School. Submit an admission enquiry.')

@section('content')

<style>
    /* ==========================================
   ADMISSION PAGE
========================================== */

.admission-hero {
    background:
        linear-gradient(
            90deg,
            rgba(237, 11, 114, .92),
            rgba(237, 11, 114, .65),
            rgba(0, 48, 86, .45)
        ),
        url("https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=2000&q=90")
        center/cover no-repeat;
}

.admission-hero-shape {
    position: absolute;
    width: 420px;
    height: 420px;
    right: 5%;
    top: 50%;
    transform: translateY(-50%);
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.18);
}


/* ==========================================
   ADMISSION CONTENT
========================================== */

.admission-intro {
    max-width: 500px;
    font-size: 1rem;
    line-height: 1.8;
}

.admission-points {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.admission-point {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 18px;
    border-radius: 20px;
    background: #fff8fb;
    border: 1px solid #f5dce9;
}

.admission-point-icon {
    width: 45px;
    height: 45px;
    flex: 0 0 45px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: var(--mant-pink);
    color: #fff;
    font-size: .75rem;
    font-weight: 900;
}

.admission-point h4 {
    color: var(--mant-blue);
    font-size: 1rem;
    font-weight: 900;
    margin-bottom: 4px;
}

.admission-point p {
    color: var(--mant-muted);
    font-size: .85rem;
    margin: 0;
    line-height: 1.6;
}


/* ==========================================
   FORM CARD
========================================== */

.admission-form-card {
    background: #fff;
    border-radius: 30px;
    padding: 35px;
    border: 1px solid #edf0f3;
    box-shadow: 0 25px 70px rgba(0,0,0,.1);
}

.form-card-top {
    margin-bottom: 28px;
}

.form-card-top > span {
    color: var(--mant-pink);
    font-size: .72rem;
    font-weight: 900;
    letter-spacing: 1.5px;
}

.form-card-top h3 {
    color: var(--mant-blue);
    font-size: 2rem;
    font-weight: 950;
    margin: 8px 0;
}

.form-card-top p {
    color: var(--mant-muted);
    font-size: .85rem;
    margin: 0;
}


/* ==========================================
   FORM INPUTS
========================================== */

.admission-form-card .form-label {
    color: var(--mant-blue);
    font-size: .8rem;
    font-weight: 850;
    margin-bottom: 8px;
}

.enquiry-input {
    min-height: 52px;
    border-radius: 14px;
    border: 1px solid #dfe4e8;
    padding: 13px 16px;
    color: #222;
    box-shadow: none !important;
}

textarea.enquiry-input {
    min-height: 135px;
    resize: vertical;
}

.enquiry-input:focus {
    border-color: var(--mant-pink);
}

.enquiry-input::placeholder {
    color: #9aa1a8;
    font-size: .88rem;
}

.invalid-feedback {
    font-size: .75rem;
    font-weight: 700;
}

.admission-form-card .alert {
    border-radius: 15px;
    border: 0;
}


/* ==========================================
   ADMISSION RESPONSIVE
========================================== */

@media (max-width: 767px) {

    .admission-hero {
        min-height: 480px;
    }

    .admission-hero-shape {
        width: 250px;
        height: 250px;
        right: -80px;
    }

    .admission-form-card {
        padding: 22px;
        border-radius: 22px;
    }

    .form-card-top h3 {
        font-size: 1.6rem;
    }
}
</style>

{{-- HERO --}}
<section class="inner-hero admission-hero">

    <div class="admission-hero-shape"></div>

    <div class="container position-relative">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <span class="hero-eyebrow">
                    ADMISSIONS
                </span>

                <h1 class="inner-hero-title">
                    BEGIN THE<br>
                    JOURNEY.
                </h1>

                <p class="inner-hero-text">
                    Tell us a little about your child and our
                    admissions team will help you take the next step.
                </p>

            </div>

        </div>

    </div>

    <div class="inner-wave"></div>

</section>


{{-- FORM SECTION --}}
<section class="white-section py-5">

    <div class="container py-lg-5">

        <div class="row g-5 align-items-start">

            {{-- LEFT CONTENT --}}
            <div class="col-lg-5">

                <span class="section-label pink-text">
                    ADMISSION ENQUIRY
                </span>

                <h2 class="section-title dark-text">
                    LET'S START<br>
                    A CONVERSATION.
                </h2>

                <p class="text-muted admission-intro">
                    We would love to learn more about your child
                    and help you understand the Manthan experience.
                </p>

                <div class="admission-points mt-4">

                    <div class="admission-point">

                        <div class="admission-point-icon">
                            01
                        </div>

                        <div>
                            <h4>Share your details</h4>
                            <p>
                                Tell us about the parent and student.
                            </p>
                        </div>

                    </div>


                    <div class="admission-point">

                        <div class="admission-point-icon">
                            02
                        </div>

                        <div>
                            <h4>Choose the class</h4>
                            <p>
                                Let us know which class you are applying for.
                            </p>
                        </div>

                    </div>


                    <div class="admission-point">

                        <div class="admission-point-icon">
                            03
                        </div>

                        <div>
                            <h4>We'll connect with you</h4>
                            <p>
                                Our admissions team will take it forward.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <div class="col-lg-7">

                <div class="admission-form-card">

                    <div class="form-card-top">

                        <span>
                            ENQUIRE NOW
                        </span>

                        <h3>
                            Tell us about your child
                        </h3>

                        <p>
                            Fields marked with * are required.
                        </p>

                    </div>


                    <div
                        id="enquirySuccess"
                        class="alert alert-success d-none"
                    ></div>

                    <div
                        id="enquiryError"
                        class="alert alert-danger d-none"
                    ></div>


                    <form
                        id="admissionEnquiryForm"
                        action="{{ route('enquiries.store') }}"
                        method="POST"
                        novalidate
                    >

                        @csrf

                        <div class="row g-4">

                            {{-- Parent --}}
                            <div class="col-md-6">

                                <label class="form-label">
                                    Parent Name *
                                </label>

                                <input
                                    type="text"
                                    name="parent_name"
                                    class="form-control enquiry-input"
                                    placeholder="Enter parent name"
                                >

                                <div
                                    class="invalid-feedback"
                                    data-error-for="parent_name"
                                ></div>

                            </div>


                            {{-- Student --}}
                            <div class="col-md-6">

                                <label class="form-label">
                                    Student Name *
                                </label>

                                <input
                                    type="text"
                                    name="student_name"
                                    class="form-control enquiry-input"
                                    placeholder="Enter student name"
                                >

                                <div
                                    class="invalid-feedback"
                                    data-error-for="student_name"
                                ></div>

                            </div>


                            {{-- Class --}}
                            <div class="col-md-6">

                                <label class="form-label">
                                    Class Applying For *
                                </label>

                                <input
                                    type="text"
                                    name="class_applying_for"
                                    class="form-control enquiry-input"
                                    placeholder="e.g. Grade 1"
                                >

                                <div
                                    class="invalid-feedback"
                                    data-error-for="class_applying_for"
                                ></div>

                            </div>


                            {{-- Mobile --}}
                            <div class="col-md-6">

                                <label class="form-label">
                                    Mobile Number *
                                </label>

                                <input
                                    type="tel"
                                    name="mobile"
                                    class="form-control enquiry-input"
                                    placeholder="10 digit mobile number"
                                    maxlength="10"
                                >

                                <div
                                    class="invalid-feedback"
                                    data-error-for="mobile"
                                ></div>

                            </div>


                            {{-- Email --}}
                            <div class="col-12">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control enquiry-input"
                                    placeholder="Enter email address"
                                >

                                <div
                                    class="invalid-feedback"
                                    data-error-for="email"
                                ></div>

                            </div>


                            {{-- Message --}}
                            <div class="col-12">

                                <label class="form-label">
                                    Message
                                </label>

                                <textarea
                                    name="message"
                                    rows="5"
                                    class="form-control enquiry-input"
                                    placeholder="Tell us anything you'd like us to know..."
                                ></textarea>

                                <div
                                    class="invalid-feedback"
                                    data-error-for="message"
                                ></div>

                            </div>


                            {{-- Submit --}}
                            <div class="col-12">

                                <button
                                    type="submit"
                                    id="enquirySubmitButton"
                                    class="btn btn-primary-mant btn-lg w-100"
                                >
                                    <span class="button-text">
                                        Submit Enquiry
                                    </span>

                                    <span
                                        class="spinner-border spinner-border-sm d-none"
                                        role="status"
                                        aria-hidden="true"
                                    ></span>
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- BOTTOM CTA --}}
<section class="navy-section py-5">

    <div class="container py-4">

        <div class="row align-items-center g-4">

            <div class="col-lg-8 text-white">

                <span class="section-label">
                    HAVE QUESTIONS?
                </span>

                <h2 class="section-title mb-2">
                    WE'RE HERE TO HELP.
                </h2>

                <p class="mb-0 text-white-50">
                    Our team is happy to guide you through
                    the admission journey.
                </p>

            </div>

            <div class="col-lg-4 text-lg-end">

                <a
                    href="{{ route('news-events.index') }}"
                    class="btn btn-light rounded-pill px-4"
                >
                    Explore School Life
                </a>

            </div>

        </div>

    </div>

</section>


@endsection


@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('admissionEnquiryForm');
    const submitButton = document.getElementById('enquirySubmitButton');
    const buttonText = submitButton.querySelector('.button-text');
    const spinner = submitButton.querySelector('.spinner-border');

    const successBox = document.getElementById('enquirySuccess');
    const errorBox = document.getElementById('enquiryError');

    form.addEventListener('submit', async function (event) {

        event.preventDefault();

        clearErrors();

        successBox.classList.add('d-none');
        errorBox.classList.add('d-none');

        submitButton.disabled = true;
        buttonText.textContent = 'Submitting...';
        spinner.classList.remove('d-none');

        try {

            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'),

                    'Accept': 'application/json'
                },
                body: new FormData(form)
            });

            const data = await response.json();

            if (response.status === 422) {

                if (data.errors) {

                    Object.entries(data.errors).forEach(
                        ([field, messages]) => {

                            showFieldError(
                                field,
                                messages[0]
                            );

                        }
                    );

                }

                if (data.message) {

                    errorBox.textContent = data.message;
                    errorBox.classList.remove('d-none');

                }

                return;
            }


            if (!response.ok) {
                throw new Error(
                    data.message ||
                    'Something went wrong. Please try again.'
                );
            }


            successBox.textContent =
                data.message ||
                'Enquiry submitted successfully.';

            successBox.classList.remove('d-none');

            form.reset();

            window.scrollTo({
                top: successBox.getBoundingClientRect().top
                    + window.scrollY
                    - 120,
                behavior: 'smooth'
            });

        } catch (error) {

            errorBox.textContent = error.message;
            errorBox.classList.remove('d-none');

        } finally {

            submitButton.disabled = false;
            buttonText.textContent = 'Submit Enquiry';
            spinner.classList.add('d-none');

        }

    });


    function showFieldError(field, message) {

        const input = form.querySelector(
            `[name="${field}"]`
        );

        const errorElement = form.querySelector(
            `[data-error-for="${field}"]`
        );

        if (input) {
            input.classList.add('is-invalid');
        }

        if (errorElement) {
            errorElement.textContent = message;
        }
    }


    function clearErrors() {

        form.querySelectorAll('.is-invalid')
            .forEach(element => {
                element.classList.remove('is-invalid');
            });

        form.querySelectorAll('[data-error-for]')
            .forEach(element => {
                element.textContent = '';
            });
    }

});
</script>

@endpush