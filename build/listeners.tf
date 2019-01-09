resource "aws_alb_listener" "alb_listener" {
    load_balancer_arn = "${aws_alb.ingresse_api_alb.arn}"
    port              = 80
    protocol          = "HTTP"

    default_action {
        target_group_arn = "${aws_alb_target_group.ingresse_alb_tg.arn}"
        type             = "forward"
    }
}
