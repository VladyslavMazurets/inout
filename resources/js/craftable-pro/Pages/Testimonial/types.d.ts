import type { UploadedFile } from "craftable-pro/types";

export type Testimonial = {
    id: string | number; 
name: string; 
position: string; 
rating: integer; 
content: string; 
custom_link: string; 
date: date; 
created_at: string; 
updated_at: string
    media?: UploadedFile[];
};

export type TestimonialForm = {
    name: string; 
position: string; 
rating: integer; 
content: string; 
custom_link: string; 
date: date; 
customer_avatar: Array<UploadedFile>
};
