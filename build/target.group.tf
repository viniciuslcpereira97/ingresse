resource "aws_lb_target_group" "ingresse-lb-tg" {
    name        = "${var.target_group["name"]}"
    port        = 80
    protocol    = "HTTP"
    target_type = "instance"
    vpc_id      = "${var.vpc_id}"

    health_check {
        healthy_threshold   = 2
        unhealthy_threshold = 2
        timeout             = 3
        protocol            = "HTTP"
        interval            = 30
        matcher             = "200"
    }
}
