How to use

    // create a new tariff
    $tariff = new Tariff('expert');

    // for 10 users and 6 months
    $tariff
        ->setCountUser(10)
        ->setCountMonth(6)
        ->calculate();

    // discount 10%
    $discount = new DiscountPercent(10);

    // apply the discount
    $tariff->applyDiscount($discount);

    // discount 500
    $discount = new DiscountValue(500);

    // apply the discount
    $tariff->applyDiscount($discount);


    echo $tariff->getCost(); // net worth
    echo $tariff->getTotalCost(); // worth with all discounts
