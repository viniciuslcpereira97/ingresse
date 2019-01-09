resource "aws_alb_target_group" "ingresse_alb_tg" {
    name        = "ingresse-api-tg"
    port        = 80
    protocol    = "HTTP"
    target_type = "instance"
    vpc_id      = "${aws_default_vpc.main.id}"

    health_check {
        healthy_threshold   = 2
        unhealthy_threshold = 2
        timeout             = 3
        protocol            = "HTTP"
        interval            = 30
        matcher             = "200"
    }
}

resource "aws_alb_target_group_attachment" "ingresse_api_first_instance" {
    target_group_arn = "${aws_alb_target_group.ingresse_alb_tg.arn}"
    target_id        = "${aws_instance.ingresse_api.id}"
    port             = 8888
}
