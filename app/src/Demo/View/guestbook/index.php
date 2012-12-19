<?php $this->load('layout/header'); ?>
<div class="row-fluid">
    <section class="span12">
        <?php $this->load('include/message'); ?>
        <?php echo $form->open($baseUrl."guestbook/new", 'post');?>
        <div class="controls">
            <?php echo $form->label('title', 'Title'); ?>
            <?php echo $form->input('text', 'title', array('value' => $this->purify(isset($title) ? $title : ''))); ?>
            <span class="help-block text-error">
            <?php echo isset($validation) ? $validation->getError('title') : ''; ?>
        </span>
        </div>
        <div class="controls">
            <?php echo $form->label('user', 'Username'); ?>
            <?php echo $form->input('text', 'user', array('value' => $this->purify(isset($user) ? $user : ''))); ?>
            <span class="help-block text-error">
            <?php echo isset($validation) ? $validation->getError('user') : ''; ?>
        </span>
        </div>
        <div class="controls">
            <?php echo $form->label('post', 'Post'); ?>
            <?php echo $form->textarea('post', $this->purify(isset($post) ? $post : '')); ?>
            <br />
        <span class="help-block text-error">
            <?php echo isset($validation) ? $validation->getError('post') : ''; ?>
        </span>
        </div>
        <?php echo $form->submit('Post', array('class' => 'btn')); ?>
    </section>
</div>
<div class="row-fluid">
    <?php if (isset($listAll)) : ?>
    <?php foreach($listAll as $post) : ?>
    <article class="guestbookPost">
        <header>
            <h2><?php echo nl2br($this->purify($post['title'])); ?></h2>
            <span class="pull-right"><?php echo $post['date']->format('y-m-d H:i'); ?></span>
        </header>
        <p>
            <?php echo nl2br($this->purify($post['post'])); ?>
        </p>
    </article>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php $this->load('layout/footer'); ?>