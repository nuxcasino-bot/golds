


<?php if( $transaction->system == 'shop'): ?>
    <tr>
    <?php if(auth()->user()->hasRole(['admin'])): ?>
        <td></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
        <td></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <?php if( $transaction->user && $transaction->user->hasRole(['distributor'])): ?>
            <td><?php echo e($transaction->user->username); ?> </td>
        <?php else: ?>
            <td></td>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <td><?php if( $transaction->shop ): ?> <?php echo e($transaction->shop->name); ?> <?php endif; ?></td>
    <?php endif; ?>
        <td></td>
    <td></td>

        <td></td>
    <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
        <td colspan="2"></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <?php if( $transaction->type == 'add' ): ?>
            <td></td>
            <td><span class="text-red"><?php echo e(abs($transaction->sum)); ?></span></td>
        <?php else: ?>
            <td><span class="text-green"><?php echo e(abs($transaction->sum)); ?></span></td>
            <td></td>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin'])): ?>
        <td colspan="2"></td>
    <?php endif; ?>
    <?php if( $transaction->type == 'add' ): ?>
        <td><span class="text-green"><?php echo e(abs($transaction->sum)); ?></span></td>
        <td></td>
    <?php else: ?>
        <td></td>
        <td><span class="text-red"><?php echo e(abs($transaction->sum)); ?></span></td>
    <?php endif; ?>
        <td colspan="2"></td>
        <td><?php echo e($transaction->created_at->format(config('app.date_time_format'))); ?></td>
    </tr>

<?php elseif( $transaction->system == 'jpg' || $transaction->system == 'bank'): ?>
    <tr>
    <?php if( $transaction->user && $transaction->user->hasRole(['admin'])): ?>
        <td><?php echo e($transaction->user->username); ?></td>
    <?php else: ?>
        <td></td>
    <?php endif; ?>
        <td colspan="4"></td>
        <td><?php echo e($transaction->title); ?></td>
        <td colspan="5"></td>
    <?php if( $transaction->type == 'add' ): ?>
        <td><span class="text-green"><?php echo e(abs($transaction->sum)); ?></span></td>
        <td></td>
    <?php else: ?>
        <td></td>
        <td><span class="text-red"><?php echo e(abs($transaction->sum)); ?></span></td>
    <?php endif; ?>
        <td colspan="4"></td>
        <td><?php echo e($transaction->created_at->format(config('app.date_time_format'))); ?></td>
    </tr>

<?php elseif( in_array($transaction->system, ['progress','tournament','refund','happyhour','invite','daily_entry','welcome_bonus','sms_bonus','wheelfortune']) ): ?>
    <tr>
    <?php if(auth()->user()->hasRole(['admin'])): ?>
        <td></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
        <td></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <td></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <td></td>
    <?php endif; ?>
    <?php if( $transaction->payeer && $transaction->payeer->hasRole(['cashier'])): ?>
        <td><?php echo e($transaction->payeer->username); ?> </td>
    <?php else: ?>
        <td></td>
    <?php endif; ?>
    <td><?php echo e($transaction->title); ?></td>

    <?php if( $transaction->user && $transaction->user->hasRole(['user'])): ?>
        <td><?php echo e($transaction->user->username); ?> </td>
    <?php else: ?>
        <td></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
        <td colspan="2"></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <td colspan="2"></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin'])): ?>
        <td colspan="2"></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
            <td></td>
        <?php if( $transaction->system == 'happyhour' && $transaction->sum2 ): ?>
            <td><span class="text-red"><?php echo e(abs($transaction->sum2)); ?></span></td>
        <?php else: ?>
            <td></td>
        <?php endif; ?>
    <?php endif; ?>
    <?php if( $transaction->type == 'add' ): ?>
        <td><span class="text-green"><?php echo e(abs($transaction->sum)); ?></span></td>
        <td></td>
    <?php else: ?>
        <td></td>
        <td><span class="text-red"><?php echo e(abs($transaction->sum)); ?></span></td>
    <?php endif; ?>
    <td><?php echo e($transaction->created_at->format(config('app.date_time_format'))); ?></td>
</tr>

<?php elseif( in_array($transaction->system, ['pincode','user','handpay','interkassa','coinbase','btcpayserver'])  ): ?>
 <tr>
    <?php if(auth()->user()->hasRole(['admin'])): ?>
        <?php if( $transaction->payeer && $transaction->payeer->hasRole(['admin'])): ?>
            <td><?php echo e($transaction->payeer->username); ?> </td>
        <?php elseif( $transaction->user && $transaction->user->hasRole(['admin'])): ?>
            <td><?php echo e($transaction->user->username); ?> </td>
        <?php else: ?>
            <td></td>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
        <?php if( $transaction->payeer && $transaction->payeer->hasRole(['agent'])): ?>
            <td><?php echo e($transaction->payeer->username); ?> </td>
        <?php elseif( $transaction->user && $transaction->user->hasRole(['agent'])): ?>
             <td><?php echo e($transaction->user->username); ?> </td>
        <?php else: ?>
            <td></td>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <?php if( $transaction->user && $transaction->user->hasRole(['distributor'])): ?>
            <td><?php echo e($transaction->user->username); ?> </td>
        <?php else: ?>
            <td></td>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <td></td>
    <?php endif; ?>
    <?php if( $transaction->payeer && $transaction->payeer->hasRole(['cashier']) ): ?>
         <td><?php echo e($transaction->payeer->username); ?> </td>
    <?php else: ?>
         <td></td>
    <?php endif; ?>
    <td><?php echo e($transaction->title); ?></td>

    <?php if( $transaction->user && $transaction->user->hasRole(['user'])): ?>
         <td><?php echo e($transaction->user->username); ?> </td>
    <?php else: ?>
         <td></td>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole(['admin', 'agent'])): ?>
        <?php if( $transaction->payeer && $transaction->payeer->hasRole(['agent'])): ?>
                <?php if( $transaction->type == 'add' ): ?>
                    <td></td>
                    <td><span class="text-red"><?php echo e(abs($transaction->sum)); ?></span></td>
                <?php else: ?>
                    <td><span class="text-green"><?php echo e(abs($transaction->sum)); ?></span></td>
                    <td></td>
                <?php endif; ?>
        <?php elseif( $transaction->user && $transaction->user->hasRole(['agent'])): ?>
            <?php if( $transaction->type == 'add' ): ?>
                <td><span class="text-green"><?php echo e(abs($transaction->sum)); ?></span></td>
                <td></td>
            <?php else: ?>
                <td></td>
                <td><span class="text-red"><?php echo e(abs($transaction->sum)); ?></span></td>
            <?php endif; ?>
        <?php else: ?>
            <td colspan="2"></td>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <?php if( $transaction->user && $transaction->user->hasRole(['distributor'])): ?>
            <?php if( $transaction->type == 'add' ): ?>
                <td><span class="text-green"><?php echo e(abs($transaction->sum)); ?></span></td>
                <td></td>
            <?php else: ?>
                <td></td>
                <td><span class="text-red"><?php echo e(abs($transaction->sum)); ?></span></td>
            <?php endif; ?>
        <?php else: ?>
            <td colspan="2"></td>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin'])): ?>
         <td colspan="2"></td>
    <?php endif; ?>
    <?php if(auth()->user()->hasRole(['admin', 'agent', 'distributor'])): ?>
        <?php if( !($transaction->user && $transaction->user->hasRole(['user']))): ?>
            <td colspan="2"></td>
        <?php elseif( $transaction->type == 'add' ): ?>
            <td></td>
            <td><span class="text-red"><?php echo e(abs($transaction->sum)); ?></span></td>
        <?php else: ?>
            <td><span class="text-green"><?php echo e(abs($transaction->sum)); ?></span></td>
            <td></td>
        <?php endif; ?>
    <?php endif; ?>
    <?php if( $transaction->user && $transaction->user->hasRole(['user'])): ?>
        <?php if( $transaction->type == 'add' ): ?>
             <td><span class="text-green"><?php echo e(abs($transaction->sum)); ?></span></td>
             <td></td>
        <?php else: ?>
             <td></td>
             <td><span class="text-red"><?php echo e(abs($transaction->sum)); ?></span></td>
        <?php endif; ?>
    <?php else: ?>
        <td colspan="2"></td>
    <?php endif; ?>
    <td><?php echo e($transaction->created_at->format(config('app.date_time_format'))); ?></td>
</tr>
<?php endif; ?>

<?php /**PATH /Users/ak/Herd/goldsvet-script/resources/views/backend/stat/partials/transaction_stat.blade.php ENDPATH**/ ?>