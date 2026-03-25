<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Skin & Co. - Consultation Form #{{$Invoiceinfo->id}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; color: #3D4A35; background: #fff; -webkit-print-color-adjust: exact; print-color-adjust: exact; font-size: 12px; }

        .cf-page { max-width: 720px; margin: 0 auto; padding: 0; }

        /* Header */
        .cf-header { background: linear-gradient(135deg, #3D4A35 0%, #5C6B4F 50%, #7A8B6A 100%); padding: 22px 28px; display: flex; align-items: center; justify-content: space-between; }
        .cf-brand { font-family: 'Georgia', serif; font-size: 24px; font-weight: 700; color: #fff; letter-spacing: 1.5px; }
        .cf-brand .amp { color: #C4A265; }
        .cf-header-right { text-align: right; color: rgba(255,255,255,0.85); font-size: 12px; line-height: 1.6; }
        .cf-header-right strong { color: #fff; font-weight: 700; font-size: 14px; }

        /* Patient Info Grid */
        .cf-info { padding: 16px 28px; background: #F8F6F1; border-bottom: 2px solid #E8EDE5; }
        .cf-info-grid { display: flex; flex-wrap: wrap; gap: 0; }
        .cf-info-col { flex: 1; min-width: 200px; }
        .cf-info-row { display: flex; align-items: baseline; padding: 5px 0; font-size: 12px; }
        .cf-info-label { font-weight: 700; color: #5C6B4F; min-width: 80px; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px; }
        .cf-info-value { color: #3D4A35; font-weight: 500; }
        .cf-info-blank { display: inline-block; border-bottom: 1px solid #A8B89A; min-width: 100px; height: 16px; }

        /* Section titles */
        .cf-section-title { background: linear-gradient(135deg, #5C6B4F, #7A8B6A); color: #fff; padding: 8px 28px; font-size: 12px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; }

        /* Service Table */
        .cf-table-wrap { padding: 14px 28px; }
        table.cf-table { width: 100%; border-collapse: collapse; }
        table.cf-table th { background: #5C6B4F; color: #fff; font-weight: 600; font-size: 10px; text-transform: uppercase; letter-spacing: 0.5px; padding: 8px 10px; text-align: left; }
        table.cf-table th:first-child { border-radius: 5px 0 0 0; }
        table.cf-table th:last-child { border-radius: 0 5px 0 0; }
        table.cf-table td { padding: 9px 10px; border-bottom: 1px solid #E8EDE5; color: #4A5540; font-size: 11px; }

        /* Health History */
        .cf-health { padding: 14px 28px 10px; }
        .cf-health-grid { display: flex; flex-wrap: wrap; }
        .cf-health-col { flex: 1; min-width: 220px; }
        .cf-health-item { display: flex; align-items: center; gap: 6px; padding: 4px 0; font-size: 11px; color: #3D4A35; }
        .cf-checkbox { width: 13px; height: 13px; border: 1.5px solid #7A8B6A; border-radius: 2px; flex-shrink: 0; }

        /* Medication notes */
        .cf-notes { padding: 10px 28px 14px; }
        .cf-notes-desc { font-size: 10.5px; color: #8A9580; line-height: 1.5; margin-bottom: 10px; padding: 8px 12px; background: #F4F7F2; border-radius: 6px; border-left: 3px solid #C4A265; }
        .cf-note-line { border-bottom: 1px dotted #A8B89A; height: 26px; }

        /* Treatment Recommended */
        .cf-treat-wrap { padding: 10px 28px 14px; }
        table.cf-treat { width: 100%; border-collapse: collapse; }
        table.cf-treat th { background: #F4F7F2; color: #3D4A35; font-weight: 600; font-size: 10px; text-transform: uppercase; letter-spacing: 0.3px; padding: 8px 8px; text-align: left; border: 1px solid #D5DDD0; }
        table.cf-treat td { padding: 28px 8px; border: 1px solid #D5DDD0; font-size: 11px; }

        /* Footer */
        .cf-footer { padding: 30px 28px 16px; display: flex; justify-content: space-between; align-items: flex-end; }
        .cf-sig-block { width: 220px; }
        .cf-sig-line { border-top: 1.5px solid #3D4A35; padding-top: 8px; }
        .cf-sig-title { font-size: 11px; font-weight: 600; color: #5C6B4F; }
        .cf-footer-right { text-align: right; font-size: 10px; color: #8A9580; line-height: 1.6; }
        .cf-footer-right strong { color: #5C6B4F; }

        /* Footer accent */
        .cf-accent { height: 4px; background: linear-gradient(90deg, #3D4A35, #7A8B6A, #C4A265); }

        @if($download != 'download')
            @media not print {
                .cf-page { margin-top: 30px; margin-bottom: 30px; border: 1px solid #E8EDE5; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
            }
            @page { size: auto; margin: 8mm 6mm; }
        @endif

        @media print {
            body { background: #fff; }
            .cf-page { max-width: 100%; border: none; box-shadow: none; border-radius: 0; }
        }
    </style>
</head>
<body>
<div class="cf-page">
    @if($invoicestatus->slug == 'cancelled')
        {{-- cancelled watermark placeholder --}}
    @endif

    <!-- Header -->
    <div class="cf-header">
        <div class="cf-brand">Skin <span class="amp">&</span> Co.</div>
        <div class="cf-header-right">
            <strong>#{{$Invoiceinfo->id}}</strong> / {{\Carbon\Carbon::parse($Invoiceinfo->created_at)->format('F j, Y')}}<br>
            Phone: {{$company_phone_number->data}} &nbsp;|&nbsp; Email: {{$account->email}}
        </div>
    </div>

    <!-- Patient Info -->
    <div class="cf-info">
        <div class="cf-info-grid">
            <div class="cf-info-col">
                <div class="cf-info-row"><span class="cf-info-label">Name</span><span class="cf-info-value">{{$patient->name}}</span></div>
                <div class="cf-info-row"><span class="cf-info-label">Patient ID</span><span class="cf-info-value">C-{{$patient->id}}</span></div>
                <div class="cf-info-row"><span class="cf-info-label">Age</span><span class="cf-info-blank"></span></div>
            </div>
            <div class="cf-info-col">
                <div class="cf-info-row"><span class="cf-info-label">Height</span><span class="cf-info-blank"></span></div>
                <div class="cf-info-row"><span class="cf-info-label">Weight</span><span class="cf-info-blank"></span></div>
                <div class="cf-info-row"><span class="cf-info-label">BMI</span><span class="cf-info-blank"></span></div>
            </div>
            <div class="cf-info-col">
                <div class="cf-info-row"><span class="cf-info-label">Consultant</span><span class="cf-info-value">{{$appointment_info->doctor->name}}</span></div>
                <div class="cf-info-row"><span class="cf-info-label">Clinic</span><span class="cf-info-value">{{$location_info->name}}</span></div>
                <div class="cf-info-row"><span class="cf-info-label">Contact</span><span class="cf-info-value">{{$location_info->fdo_phone}}</span></div>
            </div>
        </div>
    </div>

    <!-- Service Table -->
    <div class="cf-table-wrap">
        <table class="cf-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Consultancy\Service</th>
                    <th>Service Price</th>
                    <th>Discount Name</th>
                    <th>Discount Type</th>
                    <th>Discount Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{$service->name}}</td>
                    <td>
                        @if($Invoiceinfo->is_exclusive == '0')
                            @if($Invoiceinfo->service_price == '0')
                                {{number_format($Invoiceinfo->tax_including_price)}}
                            @else
                                {{number_format(($Invoiceinfo->service_price)-($Invoiceinfo->tax_price))}}
                            @endif
                        @elseif($Invoiceinfo->is_exclusive == '1')
                            @if($Invoiceinfo->service_price == '0')
                                {{number_format($Invoiceinfo->tax_including_price)}}
                            @else
                                {{number_format($Invoiceinfo->service_price)}}
                            @endif
                        @endif
                    </td>
                    <td>@if($discount != null){{$discount->name}}@else - @endif</td>
                    <td>@if($Invoiceinfo->discount_type != null){{$Invoiceinfo->discount_type}}@else - @endif</td>
                    <td>@if($Invoiceinfo->discount_price != null){{number_format($Invoiceinfo->discount_price)}}@else - @endif</td>
                    <td>{{number_format($Invoiceinfo->tax_including_price)}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Health History -->
    <div class="cf-section-title">Health History &mdash; Please check all that apply</div>
    <div class="cf-health">
        <div class="cf-health-grid">
            <div class="cf-health-col">
                <div class="cf-health-item"><span class="cf-checkbox"></span> Illness or injury within 5 years</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Any surgeries done</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> History of cardiovascular problems</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Anemia</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Kidney disease or dialysis</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Nervous disorders</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Thyroid disorders</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Liver disease</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> History of drug or alcohol use</div>
            </div>
            <div class="cf-health-col">
                <div class="cf-health-item"><span class="cf-checkbox"></span> History of heart disease</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Heart surgery/prosthesis/stents</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Dental implants/bridge/ti plates</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> History of hernia/hernia surgery</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Psychiatric disorders/depression</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> HIV Aids</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Hepatitis</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Cushing's Syndrome</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Diabetes</div>
            </div>
            <div class="cf-health-col">
                <div class="cf-health-item"><span class="cf-checkbox"></span> History of seizures or epilepsy</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Skin disease</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> High blood pressure</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Hormonal disorders/hormonal therapy</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Polycystic ovaries</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Fibroids</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Pregnancy</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Cancer</div>
                <div class="cf-health-item"><span class="cf-checkbox"></span> Others</div>
            </div>
        </div>
    </div>

    <!-- Medication Notes -->
    <div class="cf-notes">
        <div class="cf-notes-desc">Please explain any marked answer. Fully describe diagnosis, physician, treatment, medication, and so on. In addition, please list all medications that you currently take, or have recently used.</div>
        <div class="cf-note-line"></div>
        <div class="cf-note-line"></div>
        <div class="cf-note-line"></div>
    </div>

    <!-- Treatment Recommended -->
    <div class="cf-section-title">Treatment Recommended</div>
    <div class="cf-treat-wrap">
        <table class="cf-treat">
            <thead>
                <tr>
                    <th>Treatment Advised</th>
                    <th>No. of Sessions</th>
                    <th>Retail Price</th>
                    <th>Discount %</th>
                    <th>Price Offered</th>
                    <th>Customer Willing to Pay?</th>
                    <th>Client Converted?</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="cf-footer">
        <div class="cf-sig-block">
            <div class="cf-sig-line">
                <div class="cf-sig-title">Consultant Signature</div>
            </div>
        </div>
        <div class="cf-footer-right">
            {{$location_info->address}}<br>
            <strong>NTN:</strong> {{$location_info->ntn}} &nbsp;&nbsp; <strong>STN:</strong> {{$location_info->stn}}
        </div>
    </div>

    <!-- Footer accent -->
    <div class="cf-accent"></div>
</div>

<script>
    window.onload = function() {
        window.print();
    };
    window.onafterprint = function() {
        window.close();
    };
</script>

</body>
</html>
