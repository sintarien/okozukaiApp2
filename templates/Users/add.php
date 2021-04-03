<div>
    <div>
        <div>
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend class=""><h2>ユーザー作成</h2></legend>
                <?php
                    echo $this->Form->control('username',array( 'class' => "form-control"));
                    echo $this->Form->control('email',array( 'class' => "form-control"));
                    echo $this->Form->control('password',array( 'class' => "form-control"));
                ?>
            </fieldset>
            <div class="login_button">
              <?= $this->Form->button(__('アカウント作成'), ['class' => 'btn btn-primary']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
