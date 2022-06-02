<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note[]|\Cake\Collection\CollectionInterface $notes
 */
?>
<div class="notes index large-9 medium-8 columns content ">
    <?=$this->Html->link(__('New Note'), ['action' => 'add'], ['class' => 'btn btn-outline-primary mb-3']) ?>
    <?php foreach( $notes as $note): ?>
        <div class="card mb-3 center-block">
            <div>
            <div class="card-body">
                <h5 class="card-title"><?= h($note->title)?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= h($note->modified) ?></h6>
                <p class="card-text"><?= h($note->body) ?></p>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $note->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $note->id], ['confirm' => __('Are you sure')]) ?>
            </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
