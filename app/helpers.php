<?php
function makePaymentPlanChart(\App\Models\Loan $loan) {
    $labels = collect($loan->payment_plan)->pluck('due_date')->toArray();
    $loanBalances = collect($loan->payment_plan)->pluck('loan_balance')->toArray();
    $amountsDue = collect($loan->payment_plan)->pluck('amount_due')->toArray();
    $totalAmountsDue = collect($loan->payment_plan)->sum('amount_due');
    $interests = collect($loan->payment_plan)->pluck('interest')->toArray();
    $totalInterest =collect($loan->payment_plan)->sum('interest');
    return collect([
        "labels" => $labels,
        "datasets" => [
            [
                "label" => "Interest (Total: Ksh ".number_format($totalInterest,2).")",
                "backgroundColor" => "#f87979",
                "data" => $interests
            ],
            [
                "label" => "Loan Balance (Ksh)",
                "backgroundColor" => "#b47cff",
                "data" => $loanBalances
            ],
            [
                "label" => "Amount Due (Total: Ksh ".number_format($totalAmountsDue,2).")",
                "backgroundColor" => "#3f1dcb",
                "data" => $amountsDue
            ]
        ]
    ]);
}

function reducingBalanceEPI($P,$r,$t,$n) {
    $s = $t*$n;
    $rate = $r/(100*$n);
    //Equated Monthly Installment using reducing method
    $emi = ($P*$rate) * ((1+$rate)**$s)/(1*((1+$rate)**$s)-1);
    return $emi;
}

function fixedRateEPI($P,$r,$t,$n) {
    $periods = $t*$n;
    $emi = $P*(1+($r/100)*$t)/$periods;
    return floatval($emi);
}

/**
 * @param \Carbon\Carbon $start
 * @param $t
 * @param int $n
 * @param string $unit
 * @return \Illuminate\Support\Collection
 */
function getPaymentDates(\Carbon\Carbon  $start,$t, $n=12, $unit='year') {
    $dates = collect([]);
    $additional = 0;
    for ($i=0; $i<$n*$t; $i++) {
        switch ($unit) {
            case "month":
                $date = $start->addDays($additional)->format('Y-m-d');
                $additional = round($start->daysInMonth/$n);
                break;
            case "year":
            default:
                $date = $start->addMonths($additional)->format('Y-m-d');
                $additional = floor(12/$n);
            break;
        }
        $dates->push($date);
    }
    return $dates;
}
