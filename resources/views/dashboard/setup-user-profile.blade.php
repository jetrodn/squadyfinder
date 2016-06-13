@extends('master')

@section('main_content')
    <section class="profile-page profile-settings">
        <div class="container">
            <div class="row">


                <?php
                $success_message = \Illuminate\Support\Facades\Session::get('success_message');
                $error_message = \Illuminate\Support\Facades\Session::get('error_message');
                ?>


                @if(isset($success_message))
                    @include('templates/popup-succes')
                @endif

                @if(isset($error_message))
                    @include('templates/popup-error')
                @endif

                @include('templates/dashboard-menu')
                <a href="#0" style="display: none;" class="cd-popup-trigger">View Pop-up</a>


                <div class="col-md-7 col-md-offset-2 profile-more-settings">


                    <h3>Анкета</h3>
                    <div class="separator"></div>


                    <div style="z-index: -1;" class="user-profile-settings-image">
                        <img src="<?php echo url('/') ?>/images/default/social.png"
                             alt="Change Password Image">
                    </div>

                    <div class="questionnaire align-center">
                        <form method="POST"
                              action="<?php echo url('/'); ?>/dash/questionnaire-change-action"
                              class="forms">

                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="full_name">Ваше полное имя</label>
                                <input type="text" name="full_name"
                                       class="form-control" id="full_name"
                                       placeholder="{{ $user->name }}">
                            </div>

                            <div class="input-group user-setup-gender-country col-md-12">
                                <div class="row">
                                <div class="col-md-8">
                                    @include('templates/countries')
                                </div>
                                <div class=" col-md-4 genders">
                                    @if($user->gender == null)
                                        <label>

                                            <input type="radio" name="gender" id="gender-male" value="gender-male">
                                            Мужской
                                        </label>

                                        <label>
                                            <input type="radio" name="gender" id="gender-female" value="gender-female"
                                            > Женский
                                        </label>
                                    @elseif($user->gender == "gender-male")
                                        <label>
                                            <input type="radio" name="gender" id="gender-male" value="gender-male"
                                                   checked>
                                            Мужской
                                        </label>

                                        <label>
                                            <input type="radio" name="gender" id="gender-female" value="gender-female"
                                            > Женский
                                        </label>

                                    @elseif($user->gender == "gender-female")
                                        <label>
                                            <input type="radio" name="gender" id="gender-male" value="gender-male">
                                            Мужской
                                        </label>

                                        <label>
                                            <input type="radio" name="gender" id="gender-female" value="gender-female"
                                                   checked> Женский
                                        </label>
                                    @endif
                                </div>


                                </div>
                            </div>

                            <div class="form-group">
                                <label for="about_short">Кратко о себе</label>
                                <input type="text" name="about_short"
                                       class="form-control" id="about_short"
                                       @if($user->about_short != null)
                                       placeholder="{{ $user->about_short }}"
                                       @else
                                       placeholder="Кратко о себе...">
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="about_long">О себе</label>
                                    <textarea maxlength="240" onkeyup="countChar(this, 240)"
                                              name="about_long"
                                              class="form-control"
                                              id="about_long"
                                              rows="5" placeholder="Расскажи людям о себе"
                                    ></textarea>
                                <div class="char-restriction">
                                    <ul>
                                        <li id="characters">0</li>
                                        <li id="max"></li>
                                    </ul>
                                </div>
                            </div>

                            <hr>

                            <h3>Контакты</h3>
                            <div class="separator"></div>


                            <div style="z-index: -1; margin-top: -50px" class="user-profile-settings-image">
                                <img src="<?php echo url('/') ?>/images/default/social.gif"
                                     alt="Change Password Image">
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="social_skype"><i class="ion-social-skype"></i> Skype</label>
                                    <input type="text" name="social_skype"
                                           class="form-control" id="social_skype"
                                           placeholder="skype_username">
                                </div>


                                <div class="form-group">
                                    <label for="social_vk"><i class="fa fa-vk"></i> ВКонтакте
                                    </label>
                                    <input type="text" name="social_vk"
                                           class="form-control" id="social_vk"
                                           placeholder="https://vk.com/user/name">
                                </div>

                                <div class="form-group">
                                    <label for="social_facebook"><i class="ion-social-facebook"></i> Facebook</label>
                                    <input type="text" name="social_facebook"
                                           class="form-control" id="social_facebook"
                                           placeholder="https://facebook.com/user/example-user">
                                </div>


                                <div class="form-group">
                                    <label for="social_twitter"><i class="ion-social-twitter"></i> Twitter</label>
                                    <input type="text" name="social_twitter"
                                           class="form-control" id="social_twitter"
                                           placeholder="https://twitter.com/user/name">
                                </div>


                                <div class="form-group">
                                    <label for="social_googleplus"><i class="ion-social-googleplus"></i> Google
                                        Plus</label>
                                    <input type="text" name="social_googleplus"
                                           class="form-control" id="social_googleplus"
                                           placeholder="https://plus.google.com/user/name">
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="social_website"><i class="ion-android-globe"></i> Вебсайт</label>
                                    <input type="text" name="social_website"
                                           class="form-control" id="social_website"
                                           placeholder="https://example.com/">
                                </div>

                                <div class="form-group">
                                    <label for="social_github"><i class="ion-social-github"></i> GitHub</label>
                                    <input type="text" name="social_github"
                                           class="form-control" id="social_github"
                                           placeholder="https://github.com/user/name">
                                </div>

                                <div class="form-group">
                                    <label for="social_reddit"><i class="ion-social-reddit"></i> Reddit</label>
                                    <input type="text" name="social_reddit"
                                           class="form-control" id="social_reddit"
                                           placeholder="https://reddit.com/user/name">
                                </div>


                                <div class="form-group">
                                    <label for="social_linkedin"><i class="fa fa-linkedin"></i> Linkedin</label>
                                    <input type="text" name="social_linkedin"
                                           class="form-control" id="social_linkedin"
                                           placeholder="https://linkedin.com/user/name">
                                </div>

                                <div class="form-group">
                                    <label for="social_bitbucket"><i class="fa fa-bitbucket"></i> BitBucket</label>
                                    <input type="text" name="social_bitbucket"
                                           class="form-control" id="social_bitbucket"
                                           placeholder="https://bitbucket.com/user/name">
                                </div>

                            </div>

                            <div class="button-update">

                                <button type="submit" class="btn btn-success"><i class="ion-loop"></i> Обновить анкету
                                </button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
@stop