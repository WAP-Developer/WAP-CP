<!-- Content -->
<div class="container" style="margin-top: 71px;">
    <div class="row justify-content-center pt-5 pb-5">
        <div class="title-applied">
            Kirim Lamaran
        </div>
    </div>
    <div class="row pb-5 justify-content-center">
        <div class="title-applied-des">
            Anda melamar posisi <?= $nameApplied ?>
        </div>
    </div>
</div>
<form action="<?= base_url('job/applied/' . $idApplied . "/" . $nameApplied); ?>" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center recruitment">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <?= $this->session->flashdata('notification'); ?>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="front" style="font-weight: bold;">Title</label>
                        <select id="multiple" class="form-control form-control-chosen" name="title" data-placeholder="Pilih Title" multiple>
                            <option value="Tuan">Tuan</option>
                            <option value="Nyonya">Nyonya</option>
                            <option value="Nona">Nona</option>
                            <option value="Nona">Lainnya</option>
                        </select>
                        <?php echo form_error('title', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" style="font-weight: bold;">
                        <label for=" front">Nama Depan</label>
                        <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                        <input type="text" class="form-control" id="front" name="front" value="<?= set_value('front'); ?>">
                        <?php echo form_error('front', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
                    </div>
                </div>
                <div class=" col-6">
                    <div class="form-group" style="font-weight: bold;">
                        <label for=" back">Nama Belakang</label>
                        <input type="text" class="form-control" id="back" name="end" value="<?= set_value('end'); ?>">
                        <?php echo form_error('end', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" style="font-weight: bold;">
                        <label for=" country">Negara</label>
                        <input type="text" class="form-control" id="country" name="country" value="<?= set_value('country'); ?>">
                        <?php echo form_error('country', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" style="font-weight: bold;">
                        <label for=" education">Pendidikan Terakhir</label>
                        <select id="multiple" class="form-control form-control-chosen" data-placeholder="Pilih Pendidikan" name="education" multiple>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>
                        <?php echo form_error('education', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" style="font-weight: bold;">
                        <label for=" url">URL Profile (Optional)</label>
                        <input type="text" class="form-control" name="profile" id="url">
                        <?php echo form_error('profile', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" style="font-weight: bold;">
                        <label for=" email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                        <?php echo form_error('email', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" style="font-weight: bold;">
                        <label for=" contact">Nomer Kontak</label>
                        <input type="text" class="form-control" id="contact" name="hp" value="<?= set_value('hp'); ?>">
                        <?php echo form_error('hp', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group" style="font-weight: bold;">
                        <label for=" coment">Komentar (Optional)</label>
                        <textarea class="form-control" id="coment" cols="30" rows="10" placeholder="Komentar Maximal 1000 Karakter." name="comment"><?= set_value('comment'); ?></textarea>
                        <?php echo form_error('comment', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group" style="font-weight: bold;">
                        <label for=" coment">Resume</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file" name="photo">
                            <label class="custom-file-label" for="validatedCustomFile" id="file-label">Extension (.docx, .pdf)</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center pt-5 pb-5">
            <button class="btn btn-success mr-3">Kirim</button>
            <a href="<?= base_url('job'); ?>" class="btn btn-light">Kembali</a>
        </div>
    </div>
</form>