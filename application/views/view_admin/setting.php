<div class="row">
    <div class="col-md-12">
        <?php foreach ($data_pengaturan as $key) { ?>
        <form class="form-horizontal">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $breadcrumb ?></h3>
            </div>
            <div class="panel-body">
                <p>This is non libero bibendum, scelerisque arcu id, placerat nunc. Integer ullamcorper rutrum dui eget porta. Fusce enim dui, pulvinar a augue nec, dapibus hendrerit mauris. Praesent efficitur, elit non convallis faucibus, enim sapien suscipit mi, sit amet fringilla felis arcu id sem. Phasellus semper felis in odio convallis, et venenatis nisl posuere. Morbi non aliquet magna, a consectetur risus. Vivamus quis tellus eros. Nulla sagittis nisi sit amet orci consectetur laoreet. Vivamus volutpat erat ac vulputate laoreet. Phasellus eu ipsum massa.</p>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-9 col-md-offset-1">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Website</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Nama Website" value="<?= p($key->nama_aplikasi) ?>" class="form-control"/>
                                </div>                                            
                                <span class="help-block">Digunakan untuk nama website dan nama aplikasi android</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Kabupaten/Kota</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Kabupaten/Kota" value="<?= p($key->nama_kabupaten) ?>" class="form-control"/>
                                </div>                                            
                                <span class="help-block">Daerah yang menerapkan aplikasi</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Alamat</label>
                            <div class="col-md-9 col-xs-12">                                            
                                <textarea class="form-control" rows="3" style="resize: none;"><?= p($key->alamat) ?></textarea>
                                <span class="help-block">Alamat di mana kantor berada</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tentang</label>
                            <div class="col-md-9 col-xs-12">                                            
                                <textarea class="form-control" rows="7" style="resize: none;"><?= p($key->tentang) ?></textarea>
                                <span class="help-block">Default textarea field</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Meta Text</label>
                            <div class="col-md-9 col-xs-12">                                            
                                <textarea class="form-control" rows="3" style="resize: none;"><?= p($key->metatext) ?></textarea>
                                <span class="help-block">Text untuk SEO</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Maps</label>
                            <div class="col-md-9 col-xs-12">                                            
                                <textarea class="form-control" rows="5" style="resize: none;"><?= p($key->maps) ?></textarea>
                                <span class="help-block">Lokasi maps di mana kantor berada</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Logo</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <img src="<?= base_url()?>asset/be/img/logo-grey.png" alt="" class="img-responsive img-text">
                                </div>                                            
                                <span class="help-block">Disarankan ukuran untuk logo ... x ...</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <input type="file" name="foto" multiple class="file" data-preview-file-type="any" required />
                                </div>                                            
                                <span class="help-block">Mendukung file JPG dan PNG maksimal 500KB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">                               
                <center>
                    <input type="submit" class="btn btn-success btn-rounded" data-toggle="tooltip" data-placement="left" title="Tekan untuk menyimpan data" value="Simpan">
                    <button class="btn btn-danger btn-rounded" data-toggle="tooltip" data-placement="right" title="Tekan untuk membatalka">Batal</button>
                </center>
            </div>
        </div>
        </form>
        <?php } ?>
    </div>
</div>
         