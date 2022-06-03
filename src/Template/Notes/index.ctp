<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note[]|\Cake\Collection\CollectionInterface $notes
 */
?>
<script>
    var NotesApp = (function() {
        return {
            startEdit: function(id){
                document.getElementById('noteEdit' + id).style.display = 'block';
                document.getElementById('noteActions' + id).style.display = 'none';
            },
            cancelEdit: function(id) {
                document.getElementById('noteEdit' + id).style.display = 'none';
               document.getElementById('noteActions' + id).style.display = 'block';
            }
        }
    })();
</script>
<div class="notes index large-9 medium-8 columns content ">
    <?=$this->Html->link(__('New Note'), ['action' => 'add'], ['class' => 'btn btn-outline-primary mb-3']) ?>
    <?php foreach( $notes as $note): ?>
        <div class="card mb-3 center-block">
            <div>
            <div class="card-body">
                <h5 class="card-title"><?= h($note->title)?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= h($note->modified) ?></h6>
                <p class="card-text"><?= h($note->body) ?></p>
                <div class="edit-note" id="noteEdit<?=$note->id?>" style="display: none;">
                    <?= $this->Form->create($note) ?>
                    <?= $this->Form->hidden('id') ?>
                    <?php 
                        echo $this->Form->control('title', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'form-label',
                            ],
                        ]);
                        echo $this->Form->control('body', [
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'form-label',
                            ],
                        ]);
                    ?>
                    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->tag('span', __('Cancle'), [
                        'class' => 'btn btn-link',
                        'onclick' => sprintf('NotesApp.cancelEdit(%s);', $note->id),
                    ]) ?>
                    <?= $this->Form->end() ?>
                </div>
                <div id="noteActions<?= $note->id?>">
                <?= $this->Html->tag(
                    'span',
                    __('Edit'),
                    [
                        'class' => 'btn btn-link',
                        'onclick' => sprintf('NotesApp.startEdit(%s);', $note->id),
                    ]
                ) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $note->id], ['confirm' => __('Are you sure')]) ?>
            </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="paginator">
        <ul class="pagination">
            
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
         
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
