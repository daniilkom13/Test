											function adminsave() {
													if ($('#balance').val() == ''){
														$('#error_save').show();
														return $('#error_save').html('Заполните поле баланса');
													}
													
													
												$.ajax({
                                                                            type: 'POST',
                                                                            url: 'post.php',
                                                                        });