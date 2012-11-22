<p>Welcome to the question creation view</p>
<div>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Select Category</legend>
            <div class="control-group">
                <label class="control-label" for="question_category">Question Category</label>
                <div class="controls">
                    <select name="question_category" class="input-xlarge" >
                        <option value="" >--select--</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id'] ?>">
                                <?php echo $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="help-block">Determines what problem category the question belongs to</p>
                </div>
            </div>

            <div class="question" style="display: none;">
                <?php $this->load->view('admin_views/question_description_view') ?>
            </div>

            <div class="btn-group option-selection-for-select_in" style="margin-left: 16%;display: none;">
                <a class="btn btn-primary btn-mini first-option">First Option</a>
                <a class="btn btn-primary btn-mini second-option">Second Option</a>
                <a class="btn btn-primary btn-mini third-option">Third Option</a>
            </div>

            <a class="btn btn-primary btn-mini insert-gap-for-three_blank" style="display:none;margin-left: 17%">Insert Blank In Ascending Order</a>
            <a class="btn btn-primary btn-mini insert-gap-for-two_blank" style="display:none;margin-left: 17%">Insert Blank In Ascending Order</a>
            <a class="btn btn-primary btn-mini insert-gap-for-one_blank" style="display:none;margin-left: 17%">Insert Blank</a>
            <div class="quantity_a"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/question_quantity_a') ?>
            </div>
            <div class="quantity_b"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/question_quantity_b') ?>
            </div>

            <div class="numeric_answer"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/question_numeric_answer') ?>
            </div>

            <div class="numerator"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/question_numerator') ?>
            </div>
            <div class="denominator"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/question_denominator') ?>
            </div>

            <div class="control-group options_group" id="quantitative-select-one"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/quantitative_options_view') ?>
            </div>



            <div class="control-group options_group" id="select-one"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/select_one_options_view') ?>
            </div>
            <div class="control-group options_group" id="select-two"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/select_two_options_view') ?>
            </div>
            <div class="control-group options_group" id="select-in_passage"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/select-in_passage_view') ?>
            </div>
            <div class="control-group options_group" id="three-blank" style="display:none"

                 >
                     <?php $this->load->view('admin_views/three_blank_options_view') ?>
            </div>
            <div class="control-group options_group" id="two-blank" style="display:none"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/two_blank_options_view') ?>
            </div>
            <div class="control-group options_group" id="one-blank" style="display:none"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/one_blank_options_view') ?>
            </div>
            <div class="control-group options_group" id="one-blank-sentence-completion"
                 style="display: none;"
                 >
                     <?php $this->load->view('admin_views/two_blank_sentence_options_view') ?>
            </div>

            <div class="submit-question" align="center" style="display: none;">
                <input type="submit" class="btn btn-large btn-primary" value="Create Question"/>
                <input type="reset" class="btn btn-large btn-danger" value="Cancel"/>
            </div>

            <input type="hidden" name="right_answer" id="right_answer"/>
        </fieldset>

    </form>

</div>
<script src="<?php echo base_url();?>assets/js/script_for_question_view.js"></script>
