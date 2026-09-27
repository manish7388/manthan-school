@extends('layouts.admin')

@section('title', 'Admission Enquiries')
@section('page_title', 'Admission Enquiries')

@section('content')

<div class="mb-4">

    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">

        <div>

            <div class="text-uppercase fw-bold small"
                 style="color: var(--mant-pink); letter-spacing: 1px;">
                Admissions
            </div>

            <h2 class="fw-bold mb-1"
                style="color: var(--mant-blue);">
                Admission Enquiries
            </h2>

            <p class="text-muted mb-0">
                View and manage enquiries submitted by parents.
            </p>

        </div>

    </div>

</div>


{{-- TOP STATS --}}
<div class="row g-4 mb-4">

    <div class="col-md-4">

        <div class="admin-stat-card">

            <div class="admin-stat-label">
                Total Enquiries
            </div>

            <div class="admin-stat-number">
                {{ \App\Models\Enquiry::count() }}
            </div>

            <div class="admin-stat-icon">
                ✉
            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="admin-stat-card">

            <div class="admin-stat-label">
                New
            </div>

            <div class="admin-stat-number">
                {{ \App\Models\Enquiry::where('status', 'New')->count() }}
            </div>

            <div class="admin-stat-icon">
                !
            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="admin-stat-card">

            <div class="admin-stat-label">
                Contacted
            </div>

            <div class="admin-stat-number">
                {{ \App\Models\Enquiry::where('status', 'Contacted')->count() }}
            </div>

            <div class="admin-stat-icon">
                ✓
            </div>

        </div>

    </div>

</div>


{{-- FILTER --}}
<div class="admin-card mb-4">

    <div class="admin-card-body">

        <form
            method="GET"
            action="{{ route('admin.enquiries.index') }}"
        >

            <div class="row align-items-end g-3">

                <div class="col-md-5">

                    <label class="admin-form-label">
                        Filter by Status
                    </label>

                    <select
                        name="status"
                        class="form-select admin-form-select"
                    >

                        <option value="">
                            All Enquiries
                        </option>

                        <option
                            value="New"
                            {{ request('status') === 'New' ? 'selected' : '' }}
                        >
                            New
                        </option>

                        <option
                            value="Contacted"
                            {{ request('status') === 'Contacted' ? 'selected' : '' }}
                        >
                            Contacted
                        </option>

                        <option
                            value="Closed"
                            {{ request('status') === 'Closed' ? 'selected' : '' }}
                        >
                            Closed
                        </option>

                    </select>

                </div>


                <div class="col-md-auto">

                    <button
                        type="submit"
                        class="btn btn-admin-primary"
                    >
                        Apply Filter
                    </button>

                </div>


                @if(request('status'))

                    <div class="col-md-auto">

                        <a
                            href="{{ route('admin.enquiries.index') }}"
                            class="btn-admin-outline d-inline-flex"
                        >
                            Clear
                        </a>

                    </div>

                @endif

            </div>

        </form>

    </div>

</div>


{{-- ENQUIRIES TABLE --}}
<div class="admin-card">

    <div class="admin-card-header">

        <div>

            <h3 class="admin-card-title">
                Enquiry Records
            </h3>

            <div class="small text-muted mt-1">
                Newest enquiries are shown first.
            </div>

        </div>

        <span
            class="badge rounded-pill"
            style="background:#fff0f6;color:var(--mant-pink);"
        >
            {{ $enquiries->total() }} Records
        </span>

    </div>


    <div class="table-responsive">

        <table class="table admin-table align-middle mb-0">

            <thead>

                <tr>

                    <th>
                        Parent / Student
                    </th>

                    <th>
                        Class
                    </th>

                    <th>
                        Contact
                    </th>

                    <th>
                        Date
                    </th>

                    <th>
                        Status
                    </th>

                    <th>
                        CRM
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($enquiries as $enquiry)

                    <tr>

                        {{-- PARENT / STUDENT --}}
                        <td>

                            <div
                                class="fw-bold"
                                style="color:var(--mant-blue);"
                            >
                                {{ $enquiry->parent_name }}
                            </div>

                            <div class="small text-muted mt-1">
                                Student:
                                {{ $enquiry->student_name }}
                            </div>

                        </td>


                        {{-- CLASS --}}
                        <td>

                            <span
                                class="admin-status"
                                style="
                                    background:#eef7ff;
                                    color:#00538f;
                                "
                            >
                                {{ $enquiry->class_applying_for }}
                            </span>

                        </td>


                        {{-- CONTACT --}}
                        <td>

                            <div
                                class="fw-semibold"
                                style="color:#4d555d;"
                            >
                                {{ $enquiry->mobile }}
                            </div>

                            @if($enquiry->email)

                                <div
                                    class="small text-muted mt-1"
                                >
                                    {{ $enquiry->email }}
                                </div>

                            @endif

                        </td>


                        {{-- DATE --}}
                        <td>

                            <div class="small fw-semibold">

                                {{ $enquiry->created_at->format('d M Y') }}

                            </div>

                            <div class="small text-muted">

                                {{ $enquiry->created_at->format('h:i A') }}

                            </div>

                        </td>


                        {{-- STATUS --}}
                        <td>

                            <select
                                class="form-select form-select-sm enquiry-status-select"
                                data-enquiry-id="{{ $enquiry->id }}"
                                data-current-value="{{ $enquiry->status }}"
                                style="
                                    width:125px;
                                    border-radius:10px;
                                    font-size:.75rem;
                                    font-weight:800;
                                    box-shadow:none;
                                "
                            >

                                <option
                                    value="New"
                                    {{ $enquiry->status === 'New' ? 'selected' : '' }}
                                >
                                    New
                                </option>

                                <option
                                    value="Contacted"
                                    {{ $enquiry->status === 'Contacted' ? 'selected' : '' }}
                                >
                                    Contacted
                                </option>

                                <option
                                    value="Closed"
                                    {{ $enquiry->status === 'Closed' ? 'selected' : '' }}
                                >
                                    Closed
                                </option>

                            </select>

                        </td>


                        {{-- CRM --}}
                        <td>

                            @if($enquiry->crm_status === 'Sent')

                                <span class="admin-status admin-status-success">
                                    Sent
                                </span>

                            @elseif($enquiry->crm_status === 'Failed')

                                <span
                                    class="admin-status admin-status-danger"
                                    title="{{ $enquiry->crm_response }}"
                                >
                                    Failed
                                </span>

                            @else

                                <span class="admin-status admin-status-new">
                                    Pending
                                </span>

                            @endif

                            @if($enquiry->crm_response)

                                <div
                                    class="small text-muted mt-1"
                                    style="max-width:160px;"
                                >
                                    {{ \Illuminate\Support\Str::limit($enquiry->crm_response, 45) }}
                                </div>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6">

                            <div class="text-center py-5">

                                <div
                                    class="mx-auto mb-3 d-flex align-items-center justify-content-center"
                                    style="
                                        width:70px;
                                        height:70px;
                                        border-radius:50%;
                                        background:#fff0f6;
                                        color:var(--mant-pink);
                                        font-size:1.5rem;
                                    "
                                >
                                    ✉
                                </div>

                                <h5
                                    class="fw-bold"
                                    style="color:var(--mant-blue);"
                                >
                                    No Enquiries Found
                                </h5>

                                <p class="text-muted small mb-0">
                                    Admission enquiries will appear here.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    @if($enquiries->hasPages())

        <div class="p-4 border-top">

            {{ $enquiries->links() }}

        </div>

    @endif

</div>


{{-- AJAX MESSAGE --}}
<div
    id="statusUpdateMessage"
    class="position-fixed bottom-0 end-0 m-4 d-none"
    style="z-index:9999;"
>
</div>


@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const selects =
        document.querySelectorAll('.enquiry-status-select');

    const messageBox =
        document.getElementById('statusUpdateMessage');


    selects.forEach(function (select) {

        select.addEventListener('change', async function () {

            const enquiryId =
                this.dataset.enquiryId;

            const previousValue =
                this.dataset.currentValue;

            const newStatus =
                this.value;


            this.disabled = true;


            try {

                const response = await fetch(
                    `/admin/enquiries/${enquiryId}/status`,
                    {
                        method: 'PATCH',

                        headers: {
                            'Content-Type': 'application/json',

                            'Accept': 'application/json',

                            'X-CSRF-TOKEN':
                                document
                                    .querySelector(
                                        'meta[name="csrf-token"]'
                                    )
                                    .getAttribute('content')
                        },

                        body: JSON.stringify({
                            status: newStatus
                        })
                    }
                );


                const data =
                    await response.json();


                if (!response.ok) {

                    throw new Error(
                        data.message ||
                        'Unable to update status.'
                    );

                }


                this.dataset.currentValue =
                    newStatus;


                showStatusMessage(
                    data.message ||
                    'Enquiry status updated successfully.',
                    'success'
                );


            } catch (error) {

                this.value =
                    previousValue;


                showStatusMessage(
                    error.message,
                    'danger'
                );

            } finally {

                this.disabled = false;

            }

        });

    });


    function showStatusMessage(message, type) {

        messageBox.className =
            'position-fixed bottom-0 end-0 m-4';

        messageBox.style.zIndex = '9999';

        messageBox.innerHTML = `
            <div class="alert alert-${type} shadow-lg border-0 rounded-4 mb-0">
                ${message}
            </div>
        `;


        setTimeout(function () {

            messageBox.classList.add('d-none');

        }, 3000);

    }

});

</script>

@endpush