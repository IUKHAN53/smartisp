<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo e($invoice->name); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <link rel="stylesheet" href="<?php echo e(asset('/vendor/invoices/bootstrap.min.css')); ?>">

        <style type="text/css" media="screen">
            html {
                margin: 0;
            }
            body {
                font-size: 0.6875rem;
                margin: 36pt;
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                font-family: sans-serif;
                line-height: 1.1;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
        </style>
    </head>

    <body>
        
        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase">
                            <strong><?php echo e($invoice->name); ?></strong>
                        </h4>
                    </td>
                    <td class="border-0 pl-0">
                        <p><?php echo e(__('invoices::invoice.serial')); ?> <strong><?php echo e($invoice->getSerialNumber()); ?></strong></p>
                        <p><?php echo e(__('invoices::invoice.date')); ?>: <strong><?php echo e($invoice->getDate()); ?></strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0 pl-0" width="48.5%">
                        <h2><?php echo e(__('invoices::invoice.seller')); ?></h2>
                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0">
                        <h2><?php echo e(__('invoices::invoice.buyer')); ?></h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0">
                        <?php if($invoice->seller->name): ?>
                            <p class="seller-name">
                                <strong><?php echo e($invoice->seller->name); ?></strong>
                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->address): ?>
                            <p class="seller-address">
                                <?php echo e(__('invoices::invoice.address')); ?>: <?php echo e($invoice->seller->address); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->code): ?>
                            <p class="seller-code">
                                <?php echo e(__('invoices::invoice.code')); ?>: <?php echo e($invoice->seller->code); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->vat): ?>
                            <p class="seller-vat">
                                <?php echo e(__('invoices::invoice.vat')); ?>: <?php echo e($invoice->seller->vat); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->phone): ?>
                            <p class="seller-phone">
                                <?php echo e(__('invoices::invoice.phone')); ?>: <?php echo e($invoice->seller->phone); ?>

                            </p>
                        <?php endif; ?>

                        <?php $__currentLoopData = $invoice->seller->custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="seller-custom-field">
                                <?php echo e(ucfirst($key)); ?>: <?php echo e($value); ?>

                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="border-0"></td>
                    <td class="px-0">
                        <?php if($invoice->buyer->name): ?>
                            <p class="buyer-name">
                                <strong><?php echo e($invoice->buyer->name); ?></strong>
                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->address): ?>
                            <p class="buyer-address">
                                <?php echo e(__('invoices::invoice.address')); ?>: <?php echo e($invoice->buyer->address); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->code): ?>
                            <p class="buyer-code">
                                <?php echo e(__('invoices::invoice.code')); ?>: <?php echo e($invoice->buyer->code); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->vat): ?>
                            <p class="buyer-vat">
                                <?php echo e(__('invoices::invoice.vat')); ?>: <?php echo e($invoice->buyer->vat); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->phone): ?>
                            <p class="buyer-phone">
                                <?php echo e(__('invoices::invoice.phone')); ?>: <?php echo e($invoice->buyer->phone); ?>

                            </p>
                        <?php endif; ?>

                        <?php $__currentLoopData = $invoice->buyer->custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="buyer-custom-field">
                                <?php echo e(ucfirst($key)); ?>: <?php echo e($value); ?>

                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
            </tbody>
        </table>

        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="border-0 pl-0"><?php echo e(__('invoices::invoice.service')); ?></th>
                    <?php if($invoice->hasItemUnits): ?>
                        <th scope="col" class="text-center border-0"><?php echo e(__('invoices::invoice.units')); ?></th>
                    <?php endif; ?>
                    <th scope="col" class="text-center border-0"><?php echo e(__('invoices::invoice.quantity')); ?></th>
                    <th scope="col" class="text-right border-0"><?php echo e(__('invoices::invoice.price')); ?></th>
                    <?php if($invoice->hasItemDiscount): ?>
                        <th scope="col" class="text-right border-0"><?php echo e(__('invoices::invoice.discount')); ?></th>
                    <?php endif; ?>
                    <?php if($invoice->hasItemTax): ?>
                        <th scope="col" class="text-right border-0"><?php echo e(__('invoices::invoice.tax')); ?></th>
                    <?php endif; ?>
                    <th scope="col" class="text-right border-0 pr-0"><?php echo e(__('invoices::invoice.sub_total')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="pl-0"><?php echo e($item->title); ?></td>
                    <?php if($invoice->hasItemUnits): ?>
                        <td class="text-center"><?php echo e($item->units); ?></td>
                    <?php endif; ?>
                    <td class="text-center"><?php echo e($item->quantity); ?></td>
                    <td class="text-right">
                        <?php echo e($invoice->formatCurrency($item->price_per_unit)); ?>

                    </td>
                    <?php if($invoice->hasItemDiscount): ?>
                        <td class="text-right">
                            <?php echo e($invoice->formatCurrency($item->discount)); ?>

                        </td>
                    <?php endif; ?>
                    <?php if($invoice->hasItemTax): ?>
                        <td class="text-right">
                            <?php echo e($invoice->formatCurrency($item->tax)); ?>

                        </td>
                    <?php endif; ?>
                    <td class="text-right pr-0">
                        <?php echo e($invoice->formatCurrency($item->sub_total_price)); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php if($invoice->hasItemOrInvoiceDiscount()): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.total_discount')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->total_discount)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->taxable_amount): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.taxable_amount')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->taxable_amount)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->tax_rate): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.tax_rate')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->tax_rate); ?>%
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->hasItemOrInvoiceTax()): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.total_taxes')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->total_taxes)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoices::invoice.total_amount')); ?></td>
                        <td class="text-right pr-0 total-amount">
                            <?php echo e($invoice->formatCurrency($invoice->total_amount)); ?>

                        </td>
                    </tr>
            </tbody>
        </table>

        <p>
            <?php echo e(trans('invoices::invoice.amount_in_words')); ?>: <?php echo e($invoice->getTotalAmountInWords()); ?>

        </p>
        <p>
            <?php echo e(trans('invoices::invoice.pay_until')); ?>: <?php echo e($invoice->getPayUntilDate()); ?>

        </p>

        <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\smartisp\resources\views/vendor/invoices/templates/default.blade.php ENDPATH**/ ?>