<!-- <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/clndr/1.5.1/clndr.min.js'></script> -->

<div class="profile">
    <div class="profile__cover ">
        <img class="profile-image"
            src="<?= (!empty($member_list["cover_image"]))?base_url($member_list["cover_image"]):base_url("assets/img/no-cover-image.png") ?>"
            alt="" />
    </div>
    <div class="profile__img">
        <img class="profile-image" id="profileImage"
            src="<?= (!empty($member_list["profile_image"]))?base_url($member_list["profile_image"]):base_url("assets/img/no-image.png") ?>"
            alt="" />
    </div>
    <div class="container">
        <div class="profile__info d-flex align-items-start flex-column flex-sm-row justify-content-between">
            <div class="profile__member-count"><span class="text-secondary">Member since </span><span
                    class="text-primary font-weight-bold"><?= $member_list["since_date"] ?></span></div>
            <div class="profile__member-name text-center"><span
                    class="font-weight-bold"><?= $member_list["name"] ?></span>
                <div class="profile__following"><span>Following :
                        #<?= ($total_following["total_following"] > 0)?$total_following["total_following"]:0 ?></span>|<span>Followers
                        :
                        #<?= ($total_follower["total_follower"] > 0)?$total_follower["total_follower"]:0 ?></span></div>
                <div class="profile__caption"><span><?= $member_list["caption"] ?></span></div>
            </div>
            <div class="profile__member-count mt-3 mt-sm-0">
                <!-- <button class="btn btn-primary">Follow</button> -->
                <?php if (is_login_user($member_list["user_id"])): ?>
                <a href="<?= base_url('update/account') ?>"
                    class="btn bg-blue text-white font-weight-bold btn-sm">Update Account</a>
                <?php else: ?>
                <?php if (is_follow($member_list["user_id"] , $this->session->user_login["public_key"])): ?>
                <a href="<?= base_url('follow/').$member_list["user_id"] ?>" class="btn btn-primary">Following</a>
                <?php else: ?>
                <a title="Un-follow" href="<?= base_url('follow/').$member_list["user_id"] ?>"
                    class="btn btn-primary">Follow</a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="calender"></div>

    <div class="container">
        <h3 class="text-center font-weight-bold">Phots & Videos</h3>
        <div class="user-photos">
            <?php foreach ($user_file as $key => $u_img): ?>
            <?php $file_type= explode('/' ,$u_img['type']) ?>
            <?php if ($file_type[0] == "image"): ?>
            <div class="slide-item">
                <img src="<?=base_url($u_img["file_path"])?>" alt="">
            </div>
            <?php elseif($file_type[0] == "video"): ?>
            <video src="<?=base_url($u_img["file_path"])?>" controls="true"></video>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container">
        <div class="about">
            <div class="text-center">
                <h3 class="font-weight-bold">About Me</h3>
                <p>
                    <?= $member_list["about"] ?>
                </p>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="contact">
                    <h4 class="text-center">Contact</h4>
                    <ul class="list-unstyled">
                        <li class="mt-3">
                            <i class="fas fa-globe"></i>
                            <a href="<?= $member_list["website_link"] ?>"
                                target="_blank"><?= $member_list["website_link"] ?></a>
                        </li>
                        <li class="mt-3">
                            <i class="fas fa-map-marker-alt"></i>
                            <a
                                href="#"><?= (!empty($member_list["address"]))?$member_list["address"]:"No address" ?></a>
                        </li>
                        <li class="mt-3">
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:+235623652"><?= $member_list["phone_no"] ?></a>
                        </li>
                        <li class="mt-3">
                            <i class="fas fa-envelope-open"></i>
                            <a href="mailto:example@example.com"><?= $member_list["email"] ?></a>
                        </li>
                    </ul>
                </div>
                <div class="reviews mt-4">
                    <h4 class="text-center">Reviews</h4>
                    <div class="reviews-list position-relative">
                        <div id="reviews-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="text-left carousel-caption">
                                        <h5>User Name</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione,
                                            consequuntur quia omnis obcaecati incidunt nemo enim excepturi molestiae
                                            veniam alias repudiandae illo eos ex, ea quidem ullam quae tempora
                                            provident!</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="text-right carousel-caption">
                                        <h5>User Name</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione,
                                            consequuntur quia omnis obcaecati incidunt nemo enim excepturi molestiae
                                            veniam alias repudiandae illo eos ex, ea quidem ullam quae tempora
                                            provident!</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#reviews-carousel" data-slide="prev" role="button">
                                <span class="fas fa-angle-left fa-2x" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#reviews-carousel" data-slide="next" role="button">
                                <span class="fas fa-angle-right fa-2x" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-8">
                <div class="event-list border-bottom pb-3">
                    <h4 class="heading text-center">Upcoming Event</h4>
                    <div class="event-item active">
                        <div class="event-info-item">
                            <div class="title font-weight-bold">Event Name</div>
                            <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Similique, totam ab, porro debitis consectetur minima odio magni, unde delectus odit et
                                adipisci nobis error cum accusantium tenetur ipsam perspiciatis sit?</div>
                            <div class="event-time d-flex justify-content-between mt-3">
                                <div class="event-time-item">
                                    <h6 class="font-weight-bold">Start Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                                <div class="event-time-item text-right">
                                    <h6 class="font-weight-bold">End Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-info-item">
                            <div class="title font-weight-bold">Event Name</div>
                            <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Similique, totam ab, porro debitis consectetur minima odio magni, unde delectus odit et
                                adipisci nobis error cum accusantium tenetur ipsam perspiciatis sit?</div>
                            <div class="event-time d-flex justify-content-between mt-3">
                                <div class="event-time-item">
                                    <h6 class="font-weight-bold">Start Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                                <div class="event-time-item text-right">
                                    <h6 class="font-weight-bold">End Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-info-item">
                            <div class="title font-weight-bold">Event Name</div>
                            <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Similique, totam ab, porro debitis consectetur minima odio magni, unde delectus odit et
                                adipisci nobis error cum accusantium tenetur ipsam perspiciatis sit?</div>
                            <div class="event-time d-flex justify-content-between mt-3">
                                <div class="event-time-item">
                                    <h6 class="font-weight-bold">Start Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                                <div class="event-time-item text-right">
                                    <h6 class="font-weight-bold">End Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center show-more mt-3">
                        <button class="btn-block btn-light show-more-event border-0">
                            Show More
                            <i class="fa fa-angle-down d-block"></i>
                        </button>
                    </div>
                </div>
                <div class="event-list mt-3 pb-3">
                    <h4 class="heading text-center">Check Ins</h4>
                    <div class="event-item active">
                        <div class="event-info-item">
                            <div class="title font-weight-bold">Event Name</div>
                            <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Similique, totam ab, porro debitis consectetur minima odio magni, unde delectus odit et
                                adipisci nobis error cum accusantium tenetur ipsam perspiciatis sit?</div>
                            <div class="event-time d-flex justify-content-between mt-3">
                                <div class="event-time-item">
                                    <h6 class="font-weight-bold">Start Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                                <div class="event-time-item text-right">
                                    <h6 class="font-weight-bold">End Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-info-item">
                            <div class="title font-weight-bold">Event Name</div>
                            <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Similique, totam ab, porro debitis consectetur minima odio magni, unde delectus odit et
                                adipisci nobis error cum accusantium tenetur ipsam perspiciatis sit?</div>
                            <div class="event-time d-flex justify-content-between mt-3">
                                <div class="event-time-item">
                                    <h6 class="font-weight-bold">Start Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                                <div class="event-time-item text-right">
                                    <h6 class="font-weight-bold">End Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-info-item">
                            <div class="title font-weight-bold">Event Name</div>
                            <div class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Similique, totam ab, porro debitis consectetur minima odio magni, unde delectus odit et
                                adipisci nobis error cum accusantium tenetur ipsam perspiciatis sit?</div>
                            <div class="event-time d-flex justify-content-between mt-3">
                                <div class="event-time-item">
                                    <h6 class="font-weight-bold">Start Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                                <div class="event-time-item text-right">
                                    <h6 class="font-weight-bold">End Time</h6>
                                    <small>12:34pm 18/12/2019</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center show-more mt-3">
                        <button class="btn-block btn-light show-more-event border-0">
                            Show More
                            <i class="fa fa-angle-down d-block"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>