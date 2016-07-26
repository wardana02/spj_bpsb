<div class="form-group" id="rangka">
                      <label class="col-lg-2 control-label">Dalam Rangka</label>
                      <div class="col-lg-10">
                        <select class="form-control" name="id_rangka" id="id_rangka">
                            <?php
                              foreach($rangka as $dt){
                                    echo "<option value='".$dt->id_rangka."'"; 
                                    echo ">".$dt->judul_rangka."</option>";
                              }
                            ?>
                      </select>
                      </div>
          </div>