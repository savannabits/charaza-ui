@php /**
 * @var \App\Models\User $user
 * @var \App\Models\Loan $loan
*/ @endphp
@component('mail::message')
# Dear {{$user->first_name}},

Your loan of <strong style="color: lightseagreen">Ksh. {{number_format($loan->principal_amount,2)}}</strong> has been processed and disbursed.

@if ($loan->interestType->slug ==='fixed-rate')
Your loan balance is <strong style="color: orangered">Ksh. {{number_format($loan->equated_amount,2)}}</strong> and you should start repaying it on {{\Carbon\Carbon::parse($loan->repayment_start_date)->isoFormat("Do MMM, YYYY")}}.
@elseif($loan->interestType->slug ==='reducing-balance')
The interest will be applied on a <strong>Reducing Balance basis</strong>.
Your first installment is <strong style="color: orangered">Ksh. {{number_format($loan->epi,2)}}</strong> and is due on {{\Carbon\Carbon::parse($loan->repayment_start_date)->isoFormat("Do MMM, YYYY")}}.
@endif

@component('mail::button', ['url' => route('home')])
View Loan Repayment Plan
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
