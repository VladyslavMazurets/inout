import type { UploadedFile } from "craftable-pro/types";

export type Course = {
    id: string | number; 
title: string; 
slug: string; 
description: string; 
price: integer; 
discount: integer; 
duration: integer; 
content: string; 
created_at: string; 
updated_at: string; 
deleted_at: string
    media?: UploadedFile[];
};

export type CourseForm = {
    title: string; 
slug: string; 
description: string; 
price: integer; 
discount: integer; 
duration: integer; 
content: string; 
baner: Array<UploadedFile>
};
