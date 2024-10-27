import type { UploadedFile } from "craftable-pro/types";

export type Instructor = {
    id: string | number; 
first_name: string; 
last_name: string; 
slug: string; 
description: string; 
position: string; 
instagram_link: string; 
telegram_link: string; 
custom_link: string; 
created_at: string; 
updated_at: string
    media?: UploadedFile[];
};

export type InstructorForm = {
    first_name: string; 
last_name: string; 
slug: string; 
description: string; 
position: string; 
instagram_link: string; 
telegram_link: string; 
custom_link: string; 
profile_picture: Array<UploadedFile>
};
