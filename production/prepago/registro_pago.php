     <div id="step-3">
                             <div class="form-horizontal form-label-left">
                           

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Pago</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <select name="tipo_pago" class="select2_single form-control" tabindex="-1">
                          
                            <option value="1">Parcial</option>
                            <option value="2">Completo</option>
                             
                      
                          </select>
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Meses a Pagar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="meses_pagar" name="meses_pagar" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Monto<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="monto" name="monto" required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                            </div>
                          </div>


                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> % descuento aplicado<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="descuento" name="descuento" required="required" class="form-control col-md-3 col-sm-3 col-xs-12">
                            </div>
                          </div>


                           
                   
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha de Pago <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="f_pago" name="f_pago" class="date-picker form-control col-md-7 col-xs-12" disabled="disabled" required="required" type="text">
                            </div>
                          </div>

                        </div>
                      </div>